<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add any necessary meta tags, CSS links, or custom stylesheets here -->
</head>
<body>

@section('content')
<div x-data="{ openItemId: null, openAddEventForm: false }">
    
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
        @foreach($news as $new)
            <div @click="openItemId = {{ $new->id }}" class="relative p-4 bg-white border border-gray-200 rounded-lg cursor-pointer">
                <img src="{{ asset('storage/' . $new->pic) }}" alt="" class="w-full rounded-lg">
                <h3 class="font-semibold text-md sm:text-lg">{{ $new->header }}</h3>
                <p class="text-sm">{{ $new->description }}</p>
            </div>
        @endforeach

        @if(auth()->check() && auth()->user()->role == 'admin')
            <div @click="openAddEventForm = true" class="relative p-4 bg-white border border-gray-200 rounded-lg cursor-pointer">
                <div class="flex items-center justify-center h-full">
                    <span class="text-4xl sm:text-6xl">+</span>
                </div>
            </div>
        @endif
    </div>

    <div x-show="openAddEventForm" class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-25">
        <div @c;ick.away="openAddEventForm = false" class="w-full p-4 bg-white rounded-lg shadow-lg sm:w-2/3 md:w-1/2 sm:p-8">
            <h3 class="text-lg font-semibold sm:text-xl">Add Another Event</h3>
            <form action="{{ route('addnews') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="header">Event Header:</label>
                <input type="text" name="header" id="header" class="block w-full p-2 mt-2 border rounded-lg">
                
                <label for="description">Event Description:</label>
                <textarea name="description" id="description" class="block w-full p-2 mt-2 border rounded-lg" rows="3"></textarea>
                
                <label for="datetime">Event Date and Time:</label>
                <input type="datetime-local" name="datetime" id="datetime" class="block w-full p-2 mt-2 border rounded-lg">
                
                <label for="pic">Event Image:</label>
                <input type="file" name="pic" id="pic" accept="image/*" class="block w-full p-2 mt-2 border rounded-lg">
                
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Add Event</button>
            </form>
        </div>
    </div>

    @foreach($news as $new)
        <template x-if="openItemId === {{ $new->id }}">
            <div x-show="openItemId === {{ $new->id }}" class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-25">
                <div @click.away="openItemId = null" class="p-4 bg-white rounded-lg shadow-lg sm:p-8">
                    <h3 class="text-lg font-semibold">{{ $new->header }}</h3>
                    <p class="text-sm">{{ $new->description }}</p>
                    <p class="text-xs">{{ $new->datetime }}</p>
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

@extends('layouts.app')

</html>
