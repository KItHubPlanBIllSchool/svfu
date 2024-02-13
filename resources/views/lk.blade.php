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
        <div x-data="{ tab: 'profile' }">
    <div class="p-4">
        <!-- Navigation Tabs -->
        <div class="flex pb-4">
            <button @click="tab = 'profile'" :class="{ 'bg-gray-200': tab === 'profile' }" class="px-4 py-2 mr-2 rounded">Profile</button>
            <button @click="tab = 'settings'" :class="{ 'bg-gray-200': tab === 'settings' }" class="px-4 py-2 rounded">Settings</button>
        </div>

        <!-- Profile Tab Content -->
        <div x-show="tab === 'profile'">
            <div class="flex items-center space-x-4">
                <img src="img/Png.png" alt="Profile Picture" class="w-16 h-16 rounded-full">
                <div>
                    <div class="font-bold">Username: {{auth()->user()->name}}</div>
                    <div>Почта: {{ auth()->user()->email }}</div>
                    <div>Роль: {{ auth()->user()->role }}</div>
                    <div>ID: {{ auth()->user()->id }}</div>
                </div>
            </div>

            <div class="mt-4">
                <div class="font-bold">Bio:</div>
                <p>[User's Bio]</p>
            </div>

            <div class="mt-4">
                <div class="font-bold">Social Links:</div>
                <ul>
                    <li><a href="[Facebook Link]" target="_blank">Leader-ID</a></li>
                </ul>
            </div>
        </div>

        <!-- Settings Tab Content -->
        <div x-show="tab === 'settings'" style="display: none;">
            <!-- Add settings fields here -->
            <p>Settings tab content goes here.</p>
            <div style="height:200px"></div>
        </div>
    </div>
</div>
<div style="height:468px"></div>
@endsection

@section('scripts')
@endsection

</body>

@extends('layouts.app')


</html>
