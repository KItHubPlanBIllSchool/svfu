<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h1 class="mb-8 text-2xl font-bold text-center">Login</h1>
           
        <form action="{{route('login.post')}}" method="POST" wire:submit.prevent="login">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="name" id="name" name="name" class="w-full px-3 py-2 mt-1 border rounded-md" wire:model="email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 mt-1 border rounded-md" wire:model="password" required>
            </div>
            <button type="submit" class="w-full py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign Up</a></p>
    </div>
    
    @livewireScripts
</body>
</html>
