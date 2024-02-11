<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-2xl font-bold text-center mb-8">Registration</h1>
        <form action="{{route('registration.post')}}" method="POST" wire:submit.prevent="register">
        @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="name" id="name" name="name" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="name" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="password" required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role" class="w-full mt-1 px-3 py-2 border rounded-md" wire:model="role" required>
                    <option value="">Select Role</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600">Register</button>
        </form>
    </div>
    
    @livewireScripts
</body>
</html>
