@extends('layouts.app')

@section('content')
<div x-data="{ openItemId: null }">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($news as $new)
        <div @click="openItemId = {{ $new->id }}" class="bg-white border border-gray-200 rounded-lg p-4 cursor-pointer relative">
            <img src="{{ $new->pic }}" alt="News Image" class="w-full rounded-lg">
            <h3 class="text-lg font-semibold">{{ $new->header }}</h3>
            <p>{{ $new->description }}</p>
        </div>
        @endforeach
    </div>

    @foreach($news as $new)
    <template x-if="openItemId === {{ $new->id }}">
        <div x-show="openItemId === {{ $new->id }}" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 bg-black bg-opacity-25">
            <div @click.away="openItemId = null" class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-xl font-semibold">{{ $new->header }}</h3>
                <p>{{ $new->description }}</p>
            </div>
        </div>
    </template>
    @endforeach
</div>
@endsection