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
    <body class=" text-gray-900 antialiased font-inter">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">


            <div class="w-full  bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class=" flex justify-center items-center h-screen ">
                    <!-- Left: Image -->
                <div class="w-8/12 h-screen hidden lg:block">
                  <img src="{{ asset('img/login.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
                </div>
                {{ $slot }}
            </div>
            </div>
        </div>
    </body>
</html>
