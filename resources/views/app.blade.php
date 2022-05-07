<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="{{ asset('css/client.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    @livewireStyles()
</head>
<body>
    <svg class="blob" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="#B100FC" d="M51.9,-64.9C65,-51,71.6,-32.4,74.3,-13.6C77,5.1,75.8,24.1,68.2,41.5C60.7,58.9,46.8,74.7,31.7,75C16.6,75.2,0.2,59.8,-18.5,52.3C-37.1,44.8,-58.1,45.2,-68.2,35.6C-78.3,25.9,-77.4,6.2,-73.8,-12.7C-70.1,-31.7,-63.6,-49.9,-50.8,-63.8C-38.1,-77.7,-19,-87.4,0.2,-87.7C19.4,-87.9,38.9,-78.7,51.9,-64.9Z" transform="translate(100 100)" />
    </svg>
    @include('header')
    @yield('content')
    @include('footer')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @livewireScripts()
</body>
</html>