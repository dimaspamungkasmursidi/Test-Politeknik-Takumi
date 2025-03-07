<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 + Tailwind CSS</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <h1 class="text-4xl font-bold text-blue-600">Hello, Laravel + Tailwind!</h1>
    <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Lihat Tugas</a>
</body>
</html>
