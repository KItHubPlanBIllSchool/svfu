<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title Here</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

@extends('layouts.app')

@section('content')

<div x-data="{
    openItemId: null,
    openAddEventForm: false,
}">
    <h1 class="mt-8 text-3xl font-semibold text-center">Грядущие мероприятия</h1>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:3">
        @foreach($events as $event)
        
            <div @click="openItemId = {{ $event->id }}" class="relative p-4 bg-white border border-gray-200 rounded-lg cursor-pointer">
                <img src="{{ asset('storage/' . $event->pic) }}" alt="" class="w-full rounded-lg">
                <h3 class="text-lg font-semibold">{{ $event->header }}</h3>
                <p>{{ $event->description }}</p>
            </div>
        @endforeach

        @if(auth()->user()->role == 'admin')
            <div @click="openAddEventForm = true" class="relative p-4 bg-white border border-gray-200 rounded-lg cursor-pointer">
                <div class="flex items-center justify-center h-full">
                    <span class="text-6xl">+</span>
                </div>
            </div>
        @endif
    </div>

    <div x-show="openAddEventForm" class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-25">
        <div @click.away="openAddEventForm = false" class="w-1/3 p-8 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold">Добавить событие</h3>
            <form action="{{ route('addevent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="header">Заголовок:</label>
                <input type="text" name="header" id="header" class="block w-full p-2 mt-2 border rounded-lg">
                
                <label for="description">Описание:</label>
                <textarea name="description" id="description" class="block w-full p-2 mt-2 border rounded-lg" rows="3"></textarea>
                
                <label for="location">Где будет:</label>
                <input type="text" name="location" id="location" class="block w-full p-2 mt-2 border rounded-lg">
                
                <label for="event_date_time">Дата назначения мероприятия:</label>
                <input type="datetime-local" name="event_date_time" id="event_date_time" class="block w-full p-2 mt-2 border rounded-lg">
                
                <label for="pic">Картинка:</label>
                <input type="file" name="pic" id="pic" accept="image/*" class="block w-full p-2 mt-2 border rounded-lg">
                
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Add Event</button>
            </form>
        </div>
    </div>

    @foreach($events as $event)
        <template x-if="openItemId === {{ $event->id }}">
            <div x-show="openItemId === {{ $event->id }}" class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-25">
                <div @click.away="openItemId = null" class="p-8 bg-white rounded-lg shadow-lg">
                    
                    <h3 class="text-xl font-semibold">{{ $event->header }}</h3>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->location }}</p>
                    <p>{{ $event->datetime }}</p>
                    @auth
                        <form action="{{ route('registerevent') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="event_id" value="{{ $event->id }}"> 
                            <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Register for Event</button>
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

@section('scripts')
    <script>
        window.addEventListener('load', function () {
            const app = Alpine.data('appData', {
                openAddEventForm: false,
            });
        });
    </script>
@endsection

</body>
</html>
