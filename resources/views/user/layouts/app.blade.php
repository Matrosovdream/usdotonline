<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">


    <header class="bg-gray-800">
        <nav class="container mx-auto px-4 py-2 flex items-center justify-between w-4/5">
            <div>
                <a href="/" class="text-white font-bold text-lg">Search companies</a>
                <a href="/about" class="ml-4 text-gray-300 hover:text-white">About</a>
                <a href="/contact" class="ml-4 text-gray-300 hover:text-white">Contact</a>
            </div>
            <div>
                <a href="/login" class="text-gray-300 hover:text-white">Login</a>
                <a href="/register" class="ml-4 text-gray-300 hover:text-white">Register</a>
            </div>
        </nav>
    </header>

    @yield('content')

    @include('user.components.footer')

    <!--
    <footer class="bg-gray-800 py-4 fixed bottom-0 w-full">
        <div class="container mx-auto flex justify-between w-4/5">
            <div class="flex items-center">
                <img src="https://dotfiler.stan-ideas.com/wp-content/uploads/dotfiler-logo.png" alt="Logo" class="h-8">
            </div>
            <div class="flex items-center">
                <ul class="flex space-x-4">
                    <li><a href="/menu1" class="text-gray-300 hover:text-white">Menu 1</a></li>
                    <li><a href="/menu2" class="text-gray-300 hover:text-white">Menu 2</a></li>
                    <li><a href="/menu3" class="text-gray-300 hover:text-white">Menu 3</a></li>
                </ul>
            </div>
        </div>
    </footer>
    -->

</body>

</html>














<?php /* ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>