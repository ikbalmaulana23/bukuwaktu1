
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - BukuWaktu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-700">

<div x-data="{ mobileMenuOpen: false }" class="min-h-screen md:flex md:h-screen md:overflow-hidden">

    {{-- ================================= --}}
    {{-- DESKTOP SIDEBAR --}}
    {{-- ================================= --}}

    <aside class="hidden md:flex md:w-64 md:flex-shrink-0 md:flex-col md:border-r md:border-gray-200 md:bg-white">

        {{-- LOGO --}}
        <a href="/" class="flex h-16 items-center gap-3 border-b border-gray-100 px-6">
            <img src="{{ asset('img/logosquare.png') }}" class="h-9 w-9 object-contain" alt="BukuWaktu">
            <span class="text-lg font-bold tracking-tight text-gray-800">
                BukuWaktu
            </span>
        </a>

        {{-- NAVIGATION --}}
        <div class="flex flex-1 flex-col overflow-y-auto p-4">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
                Administrator
            </p>

            <nav class="space-y-1">

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="w-5 text-center">⌂</span>
                    Dashboard
                </a>

                <a href="{{ route('admin.users') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.users') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="w-5 text-center">♙</span>
                    Audit User
                </a>

                <a href="{{ route('admin.posts') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.posts') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="w-5 text-center">▤</span>
                    Audit Postingan
                </a>

                <a href="{{ route('admin.audiobooks') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.audiobooks') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="w-5 text-center">♫</span>
                    Audit Audiobook
                </a>

                <a href="{{ route('admin.comments') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.comments') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="w-5 text-center">☰</span>
                    Audit Komentar
                </a>

            </nav>

            {{-- BOTTOM MENU --}}
            <div class="mt-auto border-t border-gray-100 pt-4">

                <a href="/"
                    class="mb-2 flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-100">
                    <span class="w-5 text-center">↗</span>
                    Kunjungi Website
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50">
                        <span class="w-5 text-center">⇥</span>
                        Log Out
                    </button>
                </form>

            </div>

        </div>
    </aside>


    {{-- ================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ================================= --}}

    <div class="flex min-w-0 flex-1 flex-col md:overflow-hidden">

        {{-- DESKTOP HEADER --}}
        <header class="hidden h-16 flex-shrink-0 items-center justify-between border-b border-gray-200 bg-white px-8 md:flex">

            <div>
                <h1 class="text-lg font-semibold text-gray-800">
                    Admin Dashboard
                </h1>
                <p class="text-xs text-gray-400">
                    Kelola platform BukuWaktu
                </p>
            </div>

            <div class="flex items-center gap-3">

                <a href="/"
                    class="rounded-lg border border-gray-200 px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                    Lihat Website
                </a>

                <div class="flex items-center gap-2 rounded-lg bg-gray-50 px-3 py-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-100 text-sm font-bold text-emerald-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <span class="text-sm font-medium text-gray-700">
                        {{ auth()->user()->name }}
                    </span>
                </div>

            </div>
        </header>


        {{-- MOBILE HEADER --}}
        <header class="sticky top-0 z-30 flex h-16 flex-shrink-0 items-center justify-between border-b border-gray-200 bg-white px-4 md:hidden">

            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('img/logosquare.png') }}" class="h-9 w-9 object-contain" alt="BukuWaktu">

                <div>
                    <p class="text-sm font-bold text-gray-800">BukuWaktu</p>
                    <p class="text-[10px] text-gray-400">Administrator</p>
                </div>
            </a>

            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="flex h-10 w-10 items-center justify-center rounded-xl text-gray-600 transition hover:bg-gray-100"
                aria-label="Toggle menu"
            >
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </header>


        {{-- ================================= --}}
        {{-- MOBILE DRAWER --}}
        {{-- ================================= --}}

        <div
            x-show="mobileMenuOpen"
            x-cloak
            x-transition.opacity
            class="fixed inset-0 z-40 md:hidden"
        >

            {{-- OVERLAY --}}
            <div
                @click="mobileMenuOpen = false"
                class="absolute inset-0 bg-black/40"
            ></div>

            {{-- DRAWER --}}
            <div
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="absolute left-0 top-0 flex h-full w-72 max-w-[85%] flex-col bg-white shadow-xl"
            >

                {{-- DRAWER HEADER --}}
                <div class="flex h-16 items-center justify-between border-b border-gray-100 px-5">

                    <div class="flex items-center gap-2">
                        <img src="{{ asset('img/logosquare.png') }}" class="h-8 w-8" alt="BukuWaktu">

                        <span class="font-bold text-gray-800">Admin Menu</span>
                    </div>

                    <button @click="mobileMenuOpen = false"
                        class="flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100">
                        ✕
                    </button>

                </div>

                {{-- USER INFO --}}
                <div class="border-b border-gray-100 bg-gray-50 px-5 py-4">

                    <p class="text-xs text-gray-400">Login sebagai</p>

                    <p class="mt-1 truncate text-sm font-semibold text-gray-800">
                        {{ auth()->user()->name }}
                    </p>

                    <span class="mt-1 inline-block rounded-full bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                        Administrator
                    </span>

                </div>

                {{-- NAVIGATION --}}
                <nav class="flex-1 space-y-1 overflow-y-auto p-4">

                    <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                        Menu utama
                    </p>

                    <a @click="mobileMenuOpen = false"
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
                        {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                        <span class="w-5 text-center">⌂</span>
                        Dashboard
                    </a>

                    <a @click="mobileMenuOpen = false"
                        href="{{ route('admin.users') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
                        {{ request()->routeIs('admin.users') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                        <span class="w-5 text-center">♙</span>
                        Audit User
                    </a>

                    <a @click="mobileMenuOpen = false"
                        href="{{ route('admin.posts') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
                        {{ request()->routeIs('admin.posts') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                        <span class="w-5 text-center">▤</span>
                        Audit Postingan
                    </a>

                    <a @click="mobileMenuOpen = false"
                        href="{{ route('admin.audiobooks') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
                        {{ request()->routeIs('admin.audiobooks') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                        <span class="w-5 text-center">♫</span>
                        Audit Audiobook
                    </a>

                    <a @click="mobileMenuOpen = false"
                        href="{{ route('admin.comments') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium
                        {{ request()->routeIs('admin.comments') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-600 hover:bg-gray-100' }}">
                        <span class="w-5 text-center">☰</span>
                        Audit Komentar
                    </a>

                </nav>

                {{-- DRAWER FOOTER --}}
                <div class="border-t border-gray-100 p-4">

                    <a href="/"
                        class="mb-2 flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-600 hover:bg-gray-100">
                        <span class="w-5 text-center">↗</span>
                        Kunjungi Website
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50">
                            <span class="w-5 text-center">⇥</span>
                            Log Out
                        </button>
                    </form>

                </div>

            </div>
        </div>


        {{-- ================================= --}}
        {{-- PAGE CONTENT --}}
        {{-- ================================= --}}

        <main class="min-w-0 flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

            {{ $slot }}

        </main>

    </div>

</div>


{{-- ================================= --}}
{{-- SWEETALERT NOTIFICATIONS --}}
{{-- ================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        @if (session('pesan'))

            @if (session('pesan') === 'berhasil login')
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat Datang!',
                    text: 'Senang melihatmu kembali di BukuWaktu.',
                    confirmButtonColor: '#eab308',
                });

            @elseif (session('pesan') === 'berhasil registrasi')
                Swal.fire({
                    icon: 'success',
                    title: 'Registrasi Berhasil!',
                    text: 'Selamat bergabung dengan komunitas BukuWaktu.',
                    confirmButtonColor: '#eab308',
                });
            @endif

        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: @json($errors->first()),
                confirmButtonColor: '#eab308',
            });
        @endif

    });
</script>

</body>
</html>
