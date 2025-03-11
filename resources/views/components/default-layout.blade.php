<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @env('local')

    @else
        <meta http-equiv="Cache-control" content="private">
    @endenv

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'calculator ' }}</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style media="screen">
        [v-cloak] {
            display: none;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative overflow-hidden flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-0">
        <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 flex flex-col items-center justify-center">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
