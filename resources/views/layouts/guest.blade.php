<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Connexion</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/identification.css', 'resources/js/app.js'])
    </head>
    <body class="identification font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="column">
                <a href="#" class="nav-icon" aria-label="homepage" aria-current="page">
                    <img src="{{ asset('image/logo.png') }}" alt="logo">
                </a>
            </div>

            <div class="Login w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h2>Bienvenue ! 😁</h2>
                {{ $slot }}
                @unless (request()->is('register'))
                    <a id="register" href="{{ route('register') }}">Je suis nouveau 👋</a>
                @endunless
            </div>
        </div>
    </body>
</html>
