<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yvent</title>
@vite('resources/css/app.css')
<style>
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .flex-container > div {
        display: flex;
        align-items: center;
    }
    .flex-container a {
        margin-left: 10px;
        text-decoration: none;
        color: black;
    }
</style>
</head>
@yield('content')
<body class="min-h-screen bg-gray-100">

<div class="items-center justify-between p-4 text-white bg-white">

    <div class="items-center space-x-4">
        <div class="flex-container">
            <a href="{{ route('events') }}"><img src="img/Group 1564.svg"></a>
            <a href="{{ route('home') }}"><img src="img/Group 1565.svg"></a>
            <a href="{{ route('home') }}"><img src="img/vuesax.svg"></a>

            
                @if (Auth::check())
                    <a href="{{ route('map') }}"><img src="img/Group 1565-1.svg"></a>
                    <a href="{{ route('lk') }}"><img src="img/Group 1566.svg"></a>
                    <!-- Your dropdown menu implementation here -->
                @else
                    <div class="flex-container">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endif
            
        </div>
    </div>
</div>

<!-- JavaScript libraries/scripts can be placed here -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script>
    if (window.innerWidth <= 768) {
        const flowBiteScript = document.createElement('script');
        flowBiteScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js';
        document.body.appendChild(flowBiteScript);
    }
</script>
</body>
</html>