
<x-layout>
    <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HERO SECTION --}}
        <section id="landing-page" class="mt-8 pb-10 lg:pb-14">
            <div class="grid grid-cols-1 items-center gap-8 md:grid-cols-2 lg:gap-12">

                {{-- Hero Content --}}
                <div class="w-full">
                    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-yellow-600 sm:text-sm">
                        Welcome to BukuWaktu
                    </span>

                    <h1 class="mt-4 text-4xl font-bold leading-tight tracking-tight text-gray-950 sm:text-5xl lg:text-6xl">
                        Waktu singkat,
                        <span class="font-serif font-normal italic text-yellow-600">wawasan</span>
                        tanpa batas.
                    </h1>

                    <p class="mt-5 max-w-xl text-base leading-relaxed text-gray-500 sm:text-lg">
                        Temukan ide-ide terbaik dari buku, dengarkan audiobook,
                        dan dapatkan perspektif baru untuk kehidupan sehari-hari.
                    </p>

                    <a href="#reading"
                       class="mt-7 inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-7 py-3.5 text-sm font-semibold text-red-950 shadow-lg transition duration-300 hover:translate-x-1 hover:bg-yellow-500 sm:px-8 sm:py-4">
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
                            <div class="book-container">
                                <img class="book front rounded-md shadow-sm"
                                     src="{{ asset('img/'.$books[0]) }}"
                                     alt="Koleksi buku {{ $index + 1 }}">

                                <img class="book back rounded-md shadow-sm"
                                     src="{{ asset('img/'.$books[1]) }}"
                                     alt="Koleksi buku {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        {{-- FEATURED READING --}}
        @if($posts->isNotEmpty())
            @php($featuredPost = $posts->first())

            <section class="relative mt-2 overflow-hidden rounded-[2rem] border border-slate-200/80 bg-[#fbfaf7] shadow-sm">
                <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#f5d66b]/20 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#0f4c75]/[0.06] blur-3xl"></div>

                <div class="relative grid items-center gap-7 p-6 sm:p-9 lg:grid-cols-[0.8fr_1.2fr] lg:gap-12 lg:p-10">

                    <a href="/posts/{{ $featuredPost->slug }}"
                       class="group mx-auto block w-full max-w-[230px] sm:max-w-[260px] lg:max-w-[280px]">
                        <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-slate-200 shadow-[0_24px_55px_-25px_rgba(15,23,42,0.55)] transition duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_30px_65px_-25px_rgba(15,23,42,0.6)]">
                            <img src="{{ $featuredPost->cover ? asset('storage/'.$featuredPost->cover) : asset('img/bukuasli1.png') }}"
                                 alt="{{ $featuredPost->title }}"
                                 loading="lazy"
                                 class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.04]">
                        </div>
                    </a>

                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 rounded-full border border-[#e8dcae] bg-white/80 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-[#8a6a16] shadow-sm sm:text-xs">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#d6a92e]"></span>
                            Featured reading
                        </div>

                        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">
                            A good place to start
                        </p>

                        <h2 class="mt-2 font-serif text-3xl font-semibold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $featuredPost->title }}
                        </h2>

                        @if($featuredPost->author)
                            <p class="mt-3 text-sm text-slate-500">
                                Rangkuman oleh
                                <span class="font-semibold text-slate-800">{{ $featuredPost->author->name }}</span>
                            </p>
                        @endif

                        <p class="mt-4 max-w-xl text-sm leading-7 text-slate-600 sm:text-base">
                            Luangkan sedikit waktu untuk memahami gagasan penting,
                            menemukan sudut pandang baru, dan membawa pulang wawasan
                            dari bacaan ini.
                        </p>

                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <a href="/posts/{{ $featuredPost->slug }}"
                               class="inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-7 py-3.5 text-sm font-semibold text-red-950 shadow-lg transition duration-300 hover:translate-x-1 hover:bg-yellow-500">
                                Baca rangkuman
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>

                            <span class="text-xs text-slate-400">
                                {{ $featuredPost->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                </div>
            </section>
        @endif


{{-- KOLEKSI MINGGU INI --}}
 <section class="my-16 border rounded-lg shadow-sm p-6">

                {{-- Heading --}}
                <div class="text-center mb-8">

                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Koleksi Minggu Ini
                    </h2>

                    <p class="mt-3 max-w-xl mx-auto text-sm leading-relaxed text-slate-500 sm:text-base">
                        Pilihan rangkuman terbaik untuk menemani rasa ingin tahumu.
                    </p>

                </div>

                {{-- Carousel --}}
              <div class="relative group">

    {{-- Tombol Kiri --}}
    <button
        type="button"
        onclick="document.getElementById('weeklyCarousel').scrollBy({
            left: -286,
            behavior: 'smooth'
        })"
        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 z-20
               w-10 h-10 rounded-full bg-white shadow-lg border border-gray-200
               text-gray-700 hover:bg-gray-100 transition"
        aria-label="Geser ke kiri"
    >
        <i class="fa-solid fa-chevron-left"></i>
    </button>


    {{-- Carousel --}}
    <div
        id="weeklyCarousel"
        class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-5
               [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
    >

        @forelse ($weeklyCollection as $post)

            <div class="flex-none w-[260px] snap-start shadow-sm
                        hover:shadow-md transition rounded-lg">

                @include('partials.post-card', [
                    'post' => $post,
                    'mostRead' => $mostRead,
                    'trending' => $trending,
                    'newArrival' => $newArrival
                ])

            </div>

        @empty

            <div class="w-full py-12 text-center text-gray-500">
                <i class="fa-solid fa-book-open text-3xl mb-3"></i>
                <p>Belum ada koleksi minggu ini.</p>
            </div>

        @endforelse

    </div>


    {{-- Tombol Kanan --}}
    <button
        type="button"
        onclick="document.getElementById('weeklyCarousel').scrollBy({
            left: 286,
            behavior: 'smooth'
        })"
        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 z-20
               w-10 h-10 rounded-full bg-white shadow-lg border border-gray-200
               text-gray-700 hover:bg-gray-100 transition"
        aria-label="Geser ke kanan"
    >
        <i class="fa-solid fa-chevron-right"></i>
    </button>

</div>

            </section>


        {{-- AUDIOBOOK SECTION --}}
        <section class="mt-14 overflow-hidden rounded-3xl bg-[#eaf4ff]">

            <div class="grid items-center gap-8 p-6 sm:p-10 lg:grid-cols-2 lg:p-12">

                {{-- Audiobook Content --}}
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-700">
                        Listen and learn
                    </span>

                    <h2 class="mt-3 text-3xl font-bold leading-tight tracking-tight text-gray-950 sm:text-4xl lg:text-5xl">
                        Dengarkan.
                        <span class="font-serif font-normal italic">Pelajari.</span>
                        Tumbuh.
                    </h2>

                    <p class="mt-4 max-w-md text-sm leading-relaxed text-gray-600 sm:text-base">
                        Nikmati pengalaman belajar melalui audio.
                        Temani perjalanan, waktu istirahat, atau aktivitas harianmu
                        dengan cerita dan wawasan baru.
                    </p>

                    <a href="/audiobook"
                       class="mt-6 inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-7 py-3.5 text-sm font-semibold text-red-950 shadow-lg transition duration-300 hover:translate-x-1 hover:bg-yellow-500 sm:px-8 sm:py-4">
                        Jelajahi audiobook
                        <i class="fas fa-headphones"></i>
                    </a>
                </div>

                {{-- Audiobook Illustration --}}
                <div class="relative hidden min-h-[250px] items-center justify-center lg:flex">
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

            {{-- Audiobook List --}}
            @if(isset($audiobooks) && $audiobooks->isNotEmpty())
                <div class="mx-3 mb-3 grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 lg:gap-5">
                    @foreach($audiobooks as $audiobook)
                        <a href="{{ route('audiobook.show', $audiobook->id) }}"
                           class="group flex min-w-0 items-center gap-4 rounded-xl bg-white p-3 shadow-sm transition-all duration-300 ease-out hover:-translate-y-1.5 hover:shadow-lg sm:p-4">

                            {{-- Cover --}}
                            <div class="h-24 w-20 flex-none overflow-hidden rounded-lg sm:h-28 sm:w-24">
                                <img src="{{ $audiobook->cover ? asset('storage/'.$audiobook->cover) : asset('img/bukuasli1.png') }}"
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
                <div class="py-12 text-center">
                    <i class="fas fa-headphones text-3xl text-gray-300"></i>
                    <p class="mt-3 text-sm text-gray-500">
                        Belum ada audiobook.
                    </p>
                </div>
            @endif

        </section>

        {{-- FINAL CTA --}}
        <section class="my-12 mb-16 rounded-3xl bg-[#102f3d] px-5 py-10 text-center sm:mb-20 sm:px-12 sm:py-14">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-yellow-400">
                Make time for knowledge
            </span>

            <h2 class="mx-auto mt-4 max-w-2xl text-2xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
                Satu ide baru bisa mengubah cara pandangmu.
            </h2>

            <p class="mx-auto mt-4 max-w-lg text-sm leading-relaxed text-gray-300 sm:text-base">
                Luangkan sedikit waktu untuk membaca, mendengarkan,
                dan menemukan sesuatu yang baru.
            </p>

            <a href="#reading"
               class="mt-7 inline-flex items-center gap-3 rounded-lg bg-yellow-400 px-7 py-3.5 text-sm font-semibold text-gray-950 transition hover:bg-yellow-300 sm:px-8 sm:py-4">
                Mulai sekarang
                <i class="fas fa-arrow-up"></i>
            </a>
        </section>

    </main>
</x-layout>

{{-- PAGE SCRIPTS --}}
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Authentication Notifications --}}
    <script>
        @if(session('pesan') == 'berhasil login')
            Swal.fire({
                text: 'Selamat datang kembali!',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });
        @elseif(session('pesan') == 'login gagal')
            Swal.fire({
                text: 'Email atau password salah!',
                icon: 'error',
                confirmButtonText: 'Coba Lagi',
                width: '400px'
            });
        @elseif(session('pesan') == 'berhasil logout')
            Swal.fire({
                text: 'Anda telah logout.',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });
        @endif
    </script>

    {{-- SUCCESS MODAL --}}
    @if(session('pesan') == 'berhasil simpan data')
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
                            <path d="M14 27L23 36L39 17"
                                  stroke="currentColor"
                                  stroke-width="5"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-dasharray="60"
                                  stroke-dashoffset="60" />
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

                <button id="successButton"
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

                    box.classList.remove('opacity-0', 'scale-75', 'translate-y-8');
                    box.classList.add('opacity-100', 'scale-100', 'translate-y-0');

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
                    box.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
                    box.classList.add('opacity-0', 'scale-90', 'translate-y-4');

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
