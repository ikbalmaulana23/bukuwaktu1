
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BukuWaktu') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-700">

    <div class="min-h-screen">

        {{-- NAVIGATION --}}
        @include('layouts.navigation')

        {{-- PAGE HEADING --}}
        @isset($header)
            <header class="border-b border-gray-100 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 sm:py-7 lg:px-8">
                    <div class="text-xl font-bold tracking-tight text-gray-800 sm:text-2xl">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        {{-- PAGE CONTENT --}}
        <main class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 sm:py-8 lg:px-8">

            {{ $slot }}

        </main>

        {{-- FOOTER --}}
        <footer class="mt-auto border-t border-gray-100 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-5 text-center sm:px-6 lg:px-8">
                <p class="text-xs text-gray-400">
                    © {{ date('Y') }} BukuWaktu. Ruang untuk membaca dan berbagi pengetahuan.
                </p>
            </div>
        </footer>

    </div>

</body>
</html>
