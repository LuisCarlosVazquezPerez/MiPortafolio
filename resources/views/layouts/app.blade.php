<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('pacman')
        @stack('botonCV')
        @stack('aboutme')
        @stack('skills')
        @stack('pro')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('scripts')
        @stack('desaparecer')
        @stack('letras')
        @stack('animacion')
        @stack('skills')
    </body>
</html>
