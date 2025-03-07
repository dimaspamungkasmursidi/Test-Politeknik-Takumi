<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Task Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="">
    @include('layouts.navigation')
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
