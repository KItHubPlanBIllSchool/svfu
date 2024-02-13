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
<h1 class="mt-8 text-3xl font-semibold text-center">Карта СВФУ</h1>
@section('content')
        <img src="img/map.svg">
        <div style="height:582px"></div>
@endsection

@section('scripts')
@endsection

</body>
@extends('layouts.app')


</html>
