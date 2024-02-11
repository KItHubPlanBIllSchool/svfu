<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-2xl font-bold text-center mb-8">Login</h1>
           
        <form action="{{route('login.post')}}" method="POST" wire:submit.prevent="login">
     @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="name" id="name" name="name" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="email" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="password" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600">Login</button>
        </form>
    </div>
    
    @livewireScripts
</body>
</html>