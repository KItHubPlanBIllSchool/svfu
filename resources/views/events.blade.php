@extends('layouts.app')

@section('content')
<div x-data="{ openItemId: null }">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($events as $event)
        <div @click="openItemId = {{ $event->id }}" class="bg-white border border-gray-200 rounded-lg p-4 cursor-pointer relative">
            <img src="{{ $event->pic }}" alt="" class="w-full rounded-lg">
            <h3 class="text-lg font-semibold">{{ $event->header }}</h3>
            <p>{{ $event->description }}</p>
        </div>
        @endforeach
    </div>

    @foreach($events as $event)
    <template x-if="openItemId === {{ $event->id }}">
        <div x-show="openItemId === {{ $event->id }}" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 bg-black bg-opacity-25">
            <div @click.away="openItemId = null" class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-xl font-semibold">{{ $event->header }}</h3>
                <p>{{ $event->description }}</p>
                <p>{{ $event->location }}</p>
                @auth
                <form action="{{ route('registerevent')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}"> 
                    <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-4">Register for Event</button>
                </form>
                @else
                <p>You need to <a href="{{ route('login') }}" class="text-blue-500">login</a> to register for this event.</p>
                @endauth
            </div>
        </div>
    </template>
    @endforeach

</div>
@endsection
