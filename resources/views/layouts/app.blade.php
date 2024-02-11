<!DOCTYPE html>
<html>
<head>
    <title>Your Website Title</title>
   
	@vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="bg-gray-800 text-white flex justify-between items-center p-4">
        <span class="text-xl font-bold">Your Website Logo</span>
        
        <!-- Search bar component - replace with your actual Livewire component -->
        <div>
            Livewire Search Bar Component
        </div>
        
        <div class="flex items-center space-x-4">
            @if (Auth::check())
                <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-blue-600 hover:bg-[#3E3D5F] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Личный кабинет<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <div class="px-4 py-3 text-sm text-gray-900">
                        {{auth()->user()->name}}
                        {{auth()->user()->email}}
                        {{auth()->user()->role}}
                    </div>
                <div class="py-2">
                    <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 ">Sign out</a>
                </div>
        </div>
            @else
                <a href="{{ route('login') }}"><h1 class="cursor-pointer">login</h1></a>
                <a href="{{ route('register') }}"><h1 class="cursor-pointer"href="{{ route('register') }}">registration</h1></a>
            @endif
        </div>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script>
        Livewire is a real-time Laravel Livewire.
    </script>
    <!-- Livewire Scripts -->
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>