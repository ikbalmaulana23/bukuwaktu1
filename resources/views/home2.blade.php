
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- ========================================= --}}
        {{-- HERO SECTION --}}
        {{-- ========================================= --}}

        <section id="landing-page" class="pb-12  lg:pb-20 mt-10">

            <div class="grid grid-cols-1 items-center gap-10 md:grid-cols-2 lg:gap-16">

                {{-- Hero Content --}}
                <div class="w-full">

                    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-yellow-600 sm:text-sm">
                        Welcome to BukuWaktu
                    </span>

                    <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-gray-950 sm:text-5xl lg:text-6xl">
                        Waktu singkat,
                        <span class="font-serif font-normal italic text-yellow-600">
                            wawasan
                        </span>
                        tanpa batas.
                    </h1>

                    <p class="mt-6 max-w-xl text-base leading-relaxed text-gray-500 sm:text-lg">
                        Temukan ide-ide terbaik dari buku, dengarkan audiobook,
                        dan dapatkan perspektif baru untuk kehidupan sehari-hari.
                    </p>

                    <a href="#reading"
                       class="mt-8 inline-flex items-center gap-3 rounded-lg bg-yellow-400 text-red-950 shadow-lg transition duration-300 hover:translate-x-1 hover:bg-yellow-400 px-7 py-3.5 text-sm font-semibold  d sm:px-8 sm:py-4">
                        Mulai menjelajah
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>

                </div>

                {{-- Book Collection Illustration --}}
                <div class="hidden md:block">

                    <div class="grid grid-cols-3 gap-4">

                        @foreach([
                            ['buku1.png', 'buku2.png'],
                            ['buku3.png', 'buku4.png'],
                            ['buku5.png', 'buku6.png'],
                            ['buku7.jpg', 'buku8.jpg'],
                            ['buku9.jpg', 'buku10.jpg'],
                            ['buku11.jpg', 'buku12.jpg']
                        ] as $index => $books)

                            <div class="book-container ">
                                <img
                                    class="book front rounded-md shadow-sm"
                                    src="{{ asset('img/'.$books[0]) }}"
                                    alt="Koleksi buku {{ $index + 1 }}">

                                <img
                                    class="book back rounded-md shadow-sm"
                                    src="{{ asset('img/'.$books[1]) }}"
                                    alt="Koleksi buku {{ $index + 1 }}">
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================= --}}
        {{-- AUDIOBOOK DISCOVERY BANNER --}}
        {{-- ========================================= --}}
{{-- Summary Hero --}}
<section class="relative isolate z-0 overflow-hidden rounded-3xl bg-gradient-to-br from-[#bbca63] via-[#a8a73f] to-[#ebd405]">
    {{-- Background Decoration --}}
    <div class="absolute -right-20 -top-24 h-80 w-80 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-32 right-1/3 h-80 w-80 rounded-full bg-red-950/10"></div>

    <div class="relative grid items-center gap-10 p-7 sm:p-12 lg:grid-cols-2 lg:gap-6 lg:px-16 lg:py-20">

        {{-- Text Content --}}
        <div class="relative z-10">

            <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-2 text-xs font-bold uppercase tracking-[0.15em] text-white">
                <i class="fas fa-book-open"></i>
                Read something meaningful
            </span>

            <h2 class="mt-6 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                Ide besar dari
                <span class="font-serif font-normal italic text-yellow-300">
                    buku
                </span>
                hebat.
            </h2>

            <p class="mt-5 max-w-md text-sm leading-relaxed text-white/80 sm:text-base">
                Temukan wawasan baru dari berbagai buku pilihan.
                Baca rangkumannya, pahami idenya, dan temukan
                perspektif baru dalam waktu singkat.
            </p>

            <a href="/posts"
               class="mt-7 inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-6 py-3.5 text-sm font-bold text-red-950 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-yellow-300">
                Jelajahi rangkuman
                <i class="fas fa-arrow-right"></i>
            </a>

        </div>


{{-- Book Illustration --}}
<div class="relative hidden min-h-[380px] items-center justify-center lg:flex">

    {{-- Decorative Circle --}}
    <div class="absolute h-72 w-72 rounded-full bg-white/10"></div>

    {{-- Floating Book Icon --}}
    <div class="absolute right-8 top-8 text-4xl text-yellow-300/80">
        <i class="fas fa-book-open"></i>
    </div>

    {{-- Book 1 --}}
    <div class="relative z-20 -mr-7 flex h-56 w-40 rotate-[-9deg] flex-col justify-between rounded-xl bg-[#f5e6cf] p-5 text-gray-900 shadow-2xl transition duration-500 hover:-translate-y-3">

        <div>
            <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-red-700">
                Think again
            </p>

            <h3 class="mt-5 font-serif text-2xl font-bold leading-tight">
                THINK<br>AGAIN
            </h3>
        </div>

        <p class="text-[9px] font-semibold uppercase tracking-widest text-gray-500">
            Adam Grant
        </p>
    </div>

    {{-- Book 2 --}}
    <div class="relative z-30 flex h-64 w-44 rotate-[2deg] flex-col justify-between rounded-xl bg-[#17324d] p-5 text-white shadow-2xl transition duration-500 hover:-translate-y-3">

        <div>
            <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-yellow-400">
                Best seller
            </p>

            <h3 class="mt-6 font-serif text-2xl font-bold leading-tight">
                THE<br>OBSTACLE<br>IS THE WAY
            </h3>
        </div>

        <p class="text-[9px] font-semibold uppercase tracking-widest text-white/60">
            Ryan Holiday
        </p>
    </div>

    {{-- Book 3 --}}
    <div class="relative z-10 -ml-7 flex h-52 w-36 rotate-[10deg] flex-col justify-between rounded-xl bg-[#f4b83f] p-4 text-gray-900 shadow-2xl transition duration-500 hover:-translate-y-3">

        <div>
            <p class="text-[9px] font-bold uppercase tracking-widest">
                Habits
            </p>

            <h3 class="mt-5 font-serif text-2xl font-bold leading-tight">
                Atomic<br>Habits
            </h3>
        </div>

        <p class="text-[9px] font-semibold uppercase tracking-widest text-gray-700">
            James Clear
        </p>
    </div>

    {{-- Floating Decorations --}}
    <div class="absolute bottom-8 left-8 rotate-[-15deg] text-3xl text-yellow-300">
        <i class="fas fa-star"></i>
    </div>

    <div class="absolute left-12 top-12 text-2xl text-white/70">
        <i class="fas fa-sparkles"></i>
    </div>

</div>

    </div>
</section>



        {{-- ========================================= --}}
        {{-- BOOK SUMMARY SECTION --}}
        {{-- ========================================= --}}

        <section id="reading" class="scroll-mt-10 pt-16 sm:pt-20">

            {{-- Section Heading --}}
            <div class="flex flex-wrap items-end justify-between gap-4 sm:mb-10">

                <div>

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-yellow-600">
                        Read something meaningful
                    </span>

                    <h2 class="mt-3 text-2xl font-bold tracking-tight text-gray-950 sm:text-3xl lg:text-4xl">
                        Ide besar dari buku hebat.
                    </h2>

                    <p class="mt-3 text-sm text-gray-500 sm:text-base">
                        Rangkuman pilihan untuk menambah perspektifmu.
                    </p>

                </div>

                <span class="text-xs text-gray-400 sm:text-sm">
                    {{ $posts->count() }} rangkuman
                </span>

            </div>


            {{-- Summary Collection --}}
            @if($posts->isNotEmpty())

                <div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-5 sm:gap-y-10 lg:grid-cols-4 xl:grid-cols-5">


@foreach($posts as $post)

    <article class="group min-w-0">

        {{-- Book Cover & Title --}}
        <a href="/posts/{{ $post->slug }}" class="block">

            <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-gray-100">

                <img
                    src="{{ $post->cover
                        ? asset('storage/'.$post->cover)
                        : asset('img/bukuasli1.png') }}"
                    alt="{{ $post->title }}"
                    loading="lazy"
                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                <span class="absolute left-2 top-2 rounded-md bg-white/95 px-2.5 py-1.5 text-[9px] font-bold uppercase tracking-wider text-gray-800 sm:left-3 sm:top-3 sm:text-[10px]">
                    <i class="fas fa-book-open mr-1 text-yellow-500"></i>
                    Summary
                </span>

            </div>

            {{-- Book Information --}}
            <div class="pt-3 sm:pt-4">

                <h3 class="line-clamp-2 text-sm font-bold leading-snug text-gray-900 transition group-hover:text-yellow-700 sm:text-base">
                    {{ $post->title }}
                </h3>

                <p class="mt-2 text-[11px] text-gray-400 sm:mt-3 sm:text-xs">
                    {{ $post->created_at->format('d M Y') }}
                </p>

            </div>

        </a>

        {{-- Author Information --}}
        <div class="mt-2 text-xs text-gray-500">

            Summarized by

            <a href="/authors/{{ $post->author->username }}"
               class="mx-1 font-semibold text-gray-900 transition hover:text-yellow-700">
                {{ Str::limit($post->author->name, 20) }}
            </a>

        </div>

    </article>

@endforeach

                </div>

            @else

                <div class="py-16 text-center">

                    <i class="fas fa-book-open text-3xl text-gray-300"></i>

                    <p class="mt-4 text-sm text-gray-500">
                        Belum ada rangkuman buku.
                    </p>

                </div>

            @endif

        </section>

<section class="overflow-hidden rounded-3xl bg-[#eaf4ff] mt-20 sm:mt-24">

            {{-- Background Decoration --}}

            <div class="grid items-center gap-10 p-7 sm:p-12 lg:grid-cols-2 lg:p-16">

                <div>

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-700">
                        Listen and learn
                    </span>

                    <h2 class="mt-4 text-3xl font-bold leading-tight tracking-tight text-gray-950 sm:text-4xl lg:text-5xl">
                        Dengarkan.
                        <span class="font-serif font-normal italic">
                            Pelajari.
                        </span>
                        Tumbuh.
                    </h2>

                    <p class="mt-5 max-w-md text-sm leading-relaxed text-gray-600 sm:text-base">
                        Nikmati pengalaman belajar melalui audio.
                        Temani perjalanan, waktu istirahat, atau aktivitas harianmu
                        dengan cerita dan wawasan baru.
                    </p>

                    <a href="/posts"
                       class="mt-7 inline-flex items-center gap-3 rounded-lg bg-gray-950 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-gray-800">
                        Jelajahi audiobook
                        <i class="fas fa-headphones"></i>
                    </a>

                </div>

                {{-- Audiobook Illustration --}}
                <div class="relative hidden min-h-[280px] items-center justify-center lg:flex">

                    <div class="absolute h-64 w-64 rounded-full bg-blue-200/70"></div>

                    <div class="relative z-10 flex h-52 w-40 rotate-[-8deg] flex-col justify-between rounded-2xl bg-[#173d52] p-5 text-white shadow-2xl">

                        <i class="fas fa-headphones text-2xl"></i>

                        <div>
                            <div class="mb-2 h-1 w-full rounded-full bg-white/30">
                                <div class="h-1 w-2/3 rounded-full bg-yellow-400"></div>
                            </div>

                            <p class="text-xs text-white/70">
                                Listen. Learn. Grow.
                            </p>
                        </div>

                        <i class="fas fa-play-circle text-3xl"></i>

                    </div>

                    <div class="absolute right-10 top-5 rotate-12 text-5xl text-blue-500">
                        <i class="fas fa-music"></i>
                    </div>

                    <div class="absolute bottom-5 left-12 -rotate-12 text-4xl text-amber-500">
                        <i class="fas fa-star"></i>
                    </div>

                </div>

            </div>

        </section>
        {{-- ========================================= --}}
        {{-- AUDIOBOOK COLLECTION --}}
        {{-- ========================================= --}}

        <section id="audiobooks" class="scroll-mt-10 my-16 sm:py-20">

            {{-- Section Heading --}}
            <div class="mb-8 sm:mb-10">

                <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                    Listen anywhere
                </span>

                <h2 class="mt-3 text-2xl font-bold tracking-tight text-gray-950 sm:text-3xl lg:text-4xl">
                    Temukan audiobook pilihan.
                </h2>

                <p class="mt-3 max-w-lg text-sm leading-relaxed text-gray-500 sm:text-base">
                    Ide dan cerita yang bisa kamu dengarkan kapan saja.
                </p>

            </div>


            {{-- Audiobook Collection --}}
            @if($audiobooks && $audiobooks->isNotEmpty())

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 lg:gap-5">

                    @foreach($audiobooks as $audiobook)

                        <a href="{{ route('audiobook.show', $audiobook->id) }}"
                           class="group flex min-w-0 items-center gap-4 rounded-xl p-3 transition duration-300 hover:bg-gray-200 sm:p-4 bg-gray-100">

                            {{-- Cover --}}
                            <div class="h-24 w-20 flex-none overflow-hidden rounded-lg bg-gray-100 sm:h-28 sm:w-24">

                                <img
                                    src="{{ $audiobook->cover
                                        ? asset('storage/'.$audiobook->cover)
                                        : asset('img/bukuasli1.png') }}"
                                    alt="{{ $audiobook->title }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                            </div>

                            {{-- Information --}}
                            <div class="min-w-0 flex-1">

                                <span class="text-[10px] font-semibold uppercase tracking-widest text-amber-600">
                                    <i class="fas fa-headphones mr-1"></i>
                                    Audiobook
                                </span>

                                <h3 class="mt-2 line-clamp-2 text-sm font-semibold leading-snug text-gray-900 transition group-hover:text-blue-700 sm:text-base">
                                    {{ $audiobook->title }}
                                </h3>

                                <p class="mt-2 text-xs text-gray-400">
                                    {{ $audiobook->created_at->format('d M Y') }}
                                </p>

                                <span class="mt-3 inline-flex items-center gap-2 text-xs font-semibold text-blue-600 transition group-hover:gap-3">

                                    Dengarkan sekarang

                                    <i class="fas fa-arrow-right"></i>

                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="py-16 text-center">

                    <i class="fas fa-headphones text-3xl text-gray-300"></i>

                    <p class="mt-4 text-sm text-gray-500">
                        Belum ada audiobook.
                    </p>

                </div>

            @endif

        </section>


        {{-- ========================================= --}}
        {{-- FINAL CALL TO ACTION --}}
        {{-- ========================================= --}}

        <section class="mb-16 rounded-3xl bg-[#102f3d] px-5 py-12 text-center sm:mb-20 sm:px-12 sm:py-16">

            <span class="text-xs font-bold uppercase tracking-[0.2em] text-yellow-400">
                Make time for knowledge
            </span>

            <h2 class="mx-auto mt-5 max-w-2xl text-2xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
                Satu ide baru bisa mengubah cara pandangmu.
            </h2>

            <p class="mx-auto mt-5 max-w-lg text-sm leading-relaxed text-gray-300 sm:text-base">
                Luangkan sedikit waktu untuk membaca, mendengarkan,
                dan menemukan sesuatu yang baru.
            </p>

            <a href="#reading"
               class="mt-8 inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-7 py-3.5 text-sm font-semibold text-gray-950 transition hover:bg-yellow-300 sm:px-8 sm:py-4">

                Mulai sekarang

                <i class="fas fa-arrow-up"></i>

            </a>

        </section>

    </main>

</x-layout>


{{-- ============================================= --}}
{{-- PAGE SCRIPTS --}}
{{-- ============================================= --}}

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Authentication Notifications --}}
    <script>
        @if (session('pesan') == 'berhasil login')
            Swal.fire({
                text: 'Selamat datang kembali!',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });

        @elseif (session('pesan') == 'login gagal')
            Swal.fire({
                text: 'Email atau password salah!',
                icon: 'error',
                confirmButtonText: 'Coba Lagi',
                width: '400px'
            });

        @elseif (session('pesan') == 'berhasil logout')
            Swal.fire({
                text: 'Anda telah logout.',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });
        @endif
    </script>


    {{-- ========================================= --}}
    {{-- SUCCESS MODAL --}}
    {{-- ========================================= --}}

    @if (session('pesan') == 'berhasil simpan data')

        <div id="successModal"
             class="fixed inset-0 z-[9999] flex items-center justify-center px-4">

            {{-- Backdrop --}}
            <div id="successBackdrop"
                 class="absolute inset-0 bg-black/40 opacity-0 backdrop-blur-sm transition-opacity duration-500">
            </div>


            {{-- Modal Content --}}
            <div id="successBox"
                 class="relative w-full max-w-sm translate-y-8 scale-75 rounded-[28px] bg-white p-8 text-center opacity-0 shadow-2xl transition-all duration-500 ease-out">

                {{-- Success Icon --}}
                <div class="relative mx-auto mb-6 flex h-24 w-24 items-center justify-center">

                    <div class="absolute inset-0 animate-pulse rounded-full bg-yellow-400/20 blur-xl"></div>

                    <div id="successCircle"
                         class="relative flex h-20 w-20 scale-0 items-center justify-center rounded-full bg-yellow-500">

                        <svg id="successCheck"
                             class="h-10 w-10 text-white"
                             viewBox="0 0 52 52"
                             fill="none">

                            <path
                                d="M14 27L23 36L39 17"
                                stroke="currentColor"
                                stroke-width="5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-dasharray="60"
                                stroke-dashoffset="60"
                            />

                        </svg>

                    </div>

                </div>


                <h2 id="successTitle"
                    class="translate-y-3 text-2xl font-bold text-gray-900 opacity-0">

                    Berhasil!

                </h2>


                <p id="successText"
                   class="mt-2 translate-y-3 text-sm leading-relaxed text-gray-500 opacity-0">

                    Data pribadi kamu berhasil disimpan.

                </p>


                <button
                    id="successButton"
                    type="button"
                    class="mt-7 w-full translate-y-3 rounded-2xl bg-gray-900 px-5 py-3 font-semibold text-white opacity-0 transition-all duration-200 hover:scale-[1.02] hover:bg-gray-800 active:scale-95">

                    Mantap!

                </button>

            </div>

        </div>


        {{-- Modal Animation Styles --}}
        <style>
            #successCircle {
                transition: transform 0.55s cubic-bezier(.34, 1.56, .64, 1);
            }

            #successCheck path {
                transition: stroke-dashoffset 0.55s ease 0.35s;
            }

            #successTitle,
            #successText,
            #successButton {
                transition:
                    opacity 0.4s ease,
                    transform 0.4s cubic-bezier(.34, 1.56, .64, 1);
            }
        </style>


        {{-- Modal Animation Script --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const modal = document.getElementById('successModal');
                const backdrop = document.getElementById('successBackdrop');
                const box = document.getElementById('successBox');
                const circle = document.getElementById('successCircle');
                const check = document.querySelector('#successCheck path');
                const title = document.getElementById('successTitle');
                const message = document.getElementById('successText');
                const button = document.getElementById('successButton');

                if (!modal || !backdrop || !box || !circle || !check || !title || !message || !button) {
                    return;
                }

                // Opening animation
                requestAnimationFrame(() => {

                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');

                    box.classList.remove(
                        'opacity-0',
                        'scale-75',
                        'translate-y-8'
                    );

                    box.classList.add(
                        'opacity-100',
                        'scale-100',
                        'translate-y-0'
                    );


                    setTimeout(() => {
                        circle.classList.remove('scale-0');
                        circle.classList.add('scale-100');
                    }, 250);


                    setTimeout(() => {
                        check.style.strokeDashoffset = '0';
                    }, 350);


                    setTimeout(() => {

                        title.classList.remove('opacity-0', 'translate-y-3');
                        message.classList.remove('opacity-0', 'translate-y-3');

                    }, 550);


                    setTimeout(() => {
                        button.classList.remove('opacity-0', 'translate-y-3');
                    }, 700);

                });


                // Closing animation
                function closeSuccessModal() {

                    box.classList.remove(
                        'opacity-100',
                        'scale-100',
                        'translate-y-0'
                    );

                    box.classList.add(
                        'opacity-0',
                        'scale-90',
                        'translate-y-4'
                    );


                    backdrop.classList.remove('opacity-100');
                    backdrop.classList.add('opacity-0');


                    setTimeout(() => {
                        modal.remove();
                    }, 500);

                }


                button.addEventListener('click', closeSuccessModal);
                backdrop.addEventListener('click', closeSuccessModal);

            });
        </script>

    @endif

@endsection
