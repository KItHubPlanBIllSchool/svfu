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
                <h1 class="cursor-pointer">registrwe</h1>
            @else
                <h1 class="cursor-pointer">login</h1>
                <h1 class="cursor-pointer">registration</h1>
            @endif
        </div>
    </div>
    
    <div class="container mx-auto p-4">
        <!-- Content goes here -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script>
        Livewire is a real-time Laravel Livewire.
    </script>
    <!-- Livewire Scripts -->
</body>
</html>