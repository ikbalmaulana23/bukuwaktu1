<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BukuWaktu Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet"
          href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-50 text-gray-800 antialiased">

<div class="min-h-screen flex">

    {{-- ========================================= --}}
    {{-- DESKTOP SIDEBAR --}}
    {{-- ========================================= --}}

    <aside class="hidden md:flex fixed inset-y-0 left-0 z-40 w-20 flex-col bg-gray-900">

        {{-- Logo --}}
        <a href="/"
           class="flex items-center justify-center h-20 bg-yellow-600 hover:bg-yellow-500 transition">

            <img src="{{ asset('img/logosquare.png') }}"
                 alt="BukuWaktu"
                 class="w-14 h-14 object-contain">

        </a>

        {{-- Navigation --}}
        <nav class="flex-1 flex flex-col items-center gap-4 py-8">

            <x-dashboard-link href="/dashboard"
                :active="request()->is('dashboard')">

                <i class="fa-solid fa-house text-lg"></i>

            </x-dashboard-link>

            <x-dashboard-link href="/dashboard/audiobooks"
                :active="request()->is('dashboard/audiobooks*')">

                <i class="fa-solid fa-headphones text-lg"></i>

            </x-dashboard-link>

            <x-dashboard-link href="/dashboard/save"
                :active="request()->is('dashboard/save*')">

                <i class="fa-solid fa-bookmark text-lg"></i>

            </x-dashboard-link>

        </nav>

        {{-- Settings --}}
        <div class="flex justify-center items-center h-20 border-t border-gray-700">

            <a href="/profile"
               class="flex items-center justify-center w-12 h-12 rounded-xl
                      text-gray-400 hover:text-white hover:bg-gray-800 transition">

                <i class="fa-solid fa-gear text-lg"></i>

            </a>

        </div>

    </aside>


    {{-- ========================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================= --}}

    <div class="flex-1 min-w-0 md:ml-20">

        {{-- ========================================= --}}
        {{-- TOP HEADER --}}
        {{-- ========================================= --}}

        <header class="sticky top-0 z-30 flex items-center justify-between
                       h-16 md:h-20 px-4 sm:px-6 lg:px-10
                       bg-white border-b border-gray-100">

            {{-- Mobile Logo --}}
            <a href="/"
               class="flex md:hidden items-center gap-2">

                <img src="{{ asset('img/logosquare.png') }}"
                     alt="BukuWaktu"
                     class="w-9 h-9 object-contain">

                <span class="font-bold text-lg tracking-tight text-gray-900">
                    BukuWaktu
                </span>

            </a>


            {{-- Desktop Search --}}
            <div class="hidden md:block relative w-full max-w-md">

                <i class="fa-solid fa-magnifying-glass absolute left-4 top-3.5
                          text-gray-400"></i>

                <input type="text"
                       placeholder="Cari sesuatu..."
                       class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50
                              border border-gray-100 text-sm
                              focus:bg-white focus:border-yellow-400
                              focus:ring-2 focus:ring-yellow-100 outline-none
                              transition">

            </div>


            {{-- User Area --}}
            <div class="flex items-center gap-2 sm:gap-4 ml-auto">

                {{-- User Information --}}
                <div class="hidden sm:block text-right">

                    <p class="text-sm font-semibold text-gray-900">
                        {{ $user->name }}
                    </p>

                    <p class="text-xs text-gray-400">
                        Dashboard
                    </p>

                </div>


                {{-- Avatar --}}
                <div class="w-10 h-10 rounded-full bg-yellow-100
                            text-yellow-700 flex items-center justify-center
                            font-bold text-sm">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                            class="w-10 h-10 flex items-center justify-center
                                   rounded-xl text-gray-400
                                   hover:text-red-500 hover:bg-red-50 transition"
                            title="Logout">

                        <i class="fa-solid fa-right-from-bracket"></i>

                    </button>

                </form>

            </div>

        </header>


        {{-- ========================================= --}}
        {{-- PAGE CONTENT --}}
        {{-- ========================================= --}}

        <main class=" sm:p-6  pb-28 md:pb-10 min-h-[calc(100vh-5rem)]">

            {{ $slot }}

        </main>

    </div>

</div>


{{-- ========================================= --}}
{{-- MOBILE BOTTOM NAVIGATION --}}
{{-- ========================================= --}}

<nav class="md:hidden fixed bottom-0 inset-x-0 z-50
            bg-white border-t border-gray-200
            px-3 pt-2 pb-safe">

    <div class="grid grid-cols-3 items-center max-w-lg mx-auto">

        {{-- Dashboard --}}
        <a href="/dashboard"
           class="flex flex-col items-center justify-center gap-1 py-2
           {{ request()->is('dashboard') ? 'text-yellow-600' : 'text-gray-400' }}">

            <i class="fa-solid fa-house text-lg"></i>

            <span class="text-[10px] font-medium">
                Dashboard
            </span>

        </a>


        {{-- Audiobooks --}}
        <a href="/dashboard/audiobooks"
           class="flex flex-col items-center justify-center gap-1 py-2
           {{ request()->is('dashboard/audiobooks*') ? 'text-yellow-600' : 'text-gray-400' }}">

            <i class="fa-solid fa-headphones text-lg"></i>

            <span class="text-[10px] font-medium">
                Audiobook
            </span>

        </a>


        {{-- Saved --}}
        <a href="/dashboard/save"
           class="flex flex-col items-center justify-center gap-1 py-2
           {{ request()->is('dashboard/save*') ? 'text-yellow-600' : 'text-gray-400' }}">

            <i class="fa-solid fa-bookmark text-lg"></i>

            <span class="text-[10px] font-medium">
                Tersimpan
            </span>

        </a>

    </div>

</nav>


{{-- ========================================= --}}
{{-- SWEET ALERT --}}
{{-- ========================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        @if (session('pesan'))

            @if (session('pesan') === 'berhasil login')

                Swal.fire({
                    icon: 'success',
                    title: 'Selamat Datang!',
                    text: 'Senang melihatmu kembali di BukuWaktu.',
                    confirmButtonColor: '#9333ea',
                });

            @elseif (session('pesan') === 'berhasil registrasi')

                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Berhasil!',
                    text: 'Selamat bergabung dengan komunitas BukuWaktu.',
                    confirmButtonColor: '#9333ea',
                });

            @endif

        @endif


        @if ($errors->any())

            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: @json($errors->first()),
                confirmButtonColor: '#9333ea',
            });

        @endif

    });
</script>

</body>
</html>

