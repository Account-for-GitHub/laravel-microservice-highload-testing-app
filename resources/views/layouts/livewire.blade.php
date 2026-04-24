<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        @if (session('success'))
            <x-message message="{{ session('success') }}" />
        @endif

        <!-- Page Content -->
        <main class="min-h-screen bg-gray-100">
            <div class="py-12">
                <div class="bg-white p-8 rounded-xl shadow-md max-w-3xl mx-auto my-35">
                    {{ $slot }}
                </div>
            </div>
        </main>
        @livewireScripts
    </body>
</html>
