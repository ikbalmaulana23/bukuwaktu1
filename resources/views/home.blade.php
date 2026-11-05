<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div>
        <section id="landing-page">
            <div class="my-5 md:flex md:flex-row">
                <div class="basis-1/2">
                    <div class="p-3 font-serif text-4xl lg:text-7xl">
                        <h1>SHARE THE</h1>
                        <h1>INSIGHT FROM</h1>
                        <h1 class="highlight-text relative inline-block">THE BOOK</h1>
                        <h1>YOU</h1>
                        <h1>READ</h1>
                    </div>

                    <div class="mt-3 flex justify-center">
                        <a href="#library"
                           class="flex justify-between rounded-full bg-slate-950 px-3 py-2 text-white shadow-md transition duration-300 ease-in-out hover:translate-y-3">
                            Scroll Down
                            <i class="fa-solid fa-arrow-down m-1"></i>
                        </a>
                    </div>
                </div>

                <div class="m-2 hidden basis-1/2 md:block">
                    <div class="mb-3 flex justify-between">
                        <div class="book-container">
                            <img class="book front rounded-md" src="{{ asset('img/buku1.png') }}" alt="Sampul buku 1">
                            <img class="book back rounded-md" src="{{ asset('img/buku2.png') }}" alt="Sampul buku 2">
                        </div>
                        <div class="book-container">
                            <img class="book front rounded-md border" src="{{ asset('img/buku3.png') }}" alt="Sampul buku 3">
                            <img class="book back rounded-md border" src="{{ asset('img/buku4.png') }}" alt="Sampul buku 4">
                        </div>
                        <div class="book-container">
                            <img class="book front rounded-md border" src="{{ asset('img/buku5.png') }}" alt="Sampul buku 5">
                            <img class="book back rounded-md border" src="{{ asset('img/buku6.png') }}" alt="Sampul buku 6">
                        </div>
                    </div>

                    <div class="mb-3 flex justify-between">
                        <div class="book-container">
                            <img class="book front rounded-md border" src="{{ asset('img/buku7.jpg') }}" alt="Sampul buku 7">
                            <img class="book back rounded-md border" src="{{ asset('img/buku8.jpg') }}" alt="Sampul buku 8">
                        </div>
                        <div class="book-container">
                            <img class="book front rounded-md border" src="{{ asset('img/buku9.jpg') }}" alt="Sampul buku 9">
                            <img class="book back rounded-md border" src="{{ asset('img/buku10.jpg') }}" alt="Sampul buku 10">
                        </div>
                        <div class="book-container">
                            <img class="book front rounded-md border" src="{{ asset('img/buku11.jpg') }}" alt="Sampul buku 11">
                            <img class="book back rounded-md border" src="{{ asset('img/buku12.jpg') }}" alt="Sampul buku 12">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="library" class="mt-10 rounded-lg p-2">


            <div class="mt-20 flex flex-col justify-between gap-3 lg:flex-row">
                {{-- Bagian Kiri --}}
                <div class="basis-full p-4 lg:basis-7/12">
                    <div class="text-lg font-base">
                        {{-- Rangkuman Buku --}}
                        <div class="flex flex-col items-start gap-4 border-b py-5 sm:flex-row">
                            <img class="h-auto w-36" src="{{ asset('img/man&book.png') }}" alt="Ilustrasi rangkuman buku">
                            <div>
                                <h3 class="font-bold">Rangkuman Buku Terbaik</h3>
                                <p class="text-sm">
                                    Temukan esensi dari buku-buku favorit Anda dalam rangkuman singkat namun padat,
                                    yang mudah dipahami dan relevan untuk kehidupan sehari-hari.
                                </p>
                            </div>
                        </div>

                        {{-- Audiobook --}}
                        <div class="flex flex-col items-start gap-4 border-b py-5 sm:flex-row">
                            <img class="h-auto w-36" src="{{ asset('img/listening.png') }}" alt="Ilustrasi audiobook">
                            <div>
                                <h3 class="font-bold">Audiobook yang Memotivasi</h3>
                                <p class="text-sm">
                                    Dengarkan cerita dan ide-ide hebat kapan saja, di mana saja.
                                    Pilihan sempurna untuk Anda yang ingin belajar sambil beraktivitas.
                                </p>
                            </div>
                        </div>

                        {{-- Belajar Tanpa Batas --}}
                        <div class="flex flex-col items-start gap-4 py-5 sm:flex-row">
                            <img class="h-auto w-36" src="{{ asset('img/time.png') }}" alt="Ilustrasi waktu belajar">
                            <div>
                                <h3 class="font-bold">Belajar Tanpa Batas Waktu</h3>
                                <p class="text-sm">
                                    Maksimalkan waktu Anda dengan konten yang dirancang untuk memperkaya wawasan,
                                    menginspirasi tindakan, dan membantu Anda mencapai tujuan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bagian Kanan --}}
                <div class="basis-full p-4 lg:basis-5/12">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        @foreach ($posts as $post)
                            <article class="flex-shrink-0 transform rounded-md border bg-slate-100 p-4 transition duration-300 ease-in-out hover:scale-105">
                                <div class="mb-3 w-full">
                                    <a href="/posts/{{ $post['slug'] }}" class="block">
                                        <img
                                            src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}"
                                            class="h-36 w-full rounded-lg object-cover"
                                            alt="Sampul {{ $post->title }}"
                                        >
                                    </a>
                                </div>

                                <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600">
                                    Summarized by
                                    <span class="mx-1 font-semibold text-gray-900">
                                        {{ Str::limit($post->author->name, 20) }}
                                    </span>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>




    <div class="mx-auto max-w-7xl rounded-xl p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-8 text-center">
            <h1 class="highlight-text inline-block pt-3 text-4xl font-bold">
                #dibacainbuku
            </h1>

            <p class="mt-2 text-sm text-gray-700">
                baca buku lebih <span class="font-serif italic">mudah</span>,
                karena kita lebih dekat
            </p>
        </div>

        @php
            $backgrounds = [
                '#ff792b',
                '#485000',
                '#4895e8',
                '#99009b',
                '#55b9c9',
                '#ffffbd',
                '#00455b',
                '#ffc400',
            ];
        @endphp

        {{-- Library Grid --}}
        <div class="grid grid-cols-1 gap-x-5 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ($audiobooks as $index => $audiobook)

                <article class="group min-w-0">

                    {{-- Cover Area --}}
                    <a href="{{ route('audiobook.show', $audiobook->id) }}"
                       class="relative flex h-48 items-center justify-center overflow-hidden transition-opacity duration-300 hover:opacity-90"
                       style="background-color: {{ $backgrounds[$index % count($backgrounds)] }}">

                        @if ($audiobook->cover)
                            <img
                                src="{{ asset('storage/' . $audiobook->cover) }}"
                                alt="{{ $audiobook->title }}"
                                class="h-36 w-28 object-cover shadow-lg transition-transform duration-500 group-hover:scale-105"
                            >
                        @else
                            <div class="flex h-36 w-28 items-center justify-center bg-white/20 p-3 text-center text-sm font-bold text-white shadow-lg">
                                {{ $audiobook->title }}
                            </div>
                        @endif

                    </a>

                    {{-- Book Information --}}
                    <div class="pt-3">

                        <div class="flex items-start justify-between gap-2">

                            <a href="{{ route('audiobook.show', $audiobook->id) }}"
                               class="text-sm font-bold leading-snug text-gray-900 transition-colors hover:text-[#737500]">
                                {{ $audiobook->title }}
                            </a>

                            {{-- Bookmark --}}
                            <button
                                type="button"
                                aria-label="Bookmark buku"
                                class="shrink-0 text-gray-500 transition-colors hover:text-[#737500]">
                                <i class="fa-regular fa-bookmark text-lg"></i>
                            </button>

                        </div>

                        {{-- Description --}}
                        <p class="mt-2 text-xs leading-relaxed text-gray-700">
                            {{ Str::limit($audiobook->description ?? 'Temukan pengalaman mendengarkan buku yang menarik dan inspiratif.', 180) }}
                        </p>

                        {{-- Author / Speaker --}}
                        <div class="mt-4">
                            <p class="text-[11px] font-bold uppercase tracking-wide text-gray-900">
                                {{ $audiobook->speaker->name ?? 'Unknown Speaker' }}
                            </p>

                            <p class="mt-0.5 text-[10px] font-semibold uppercase text-gray-600">
                                {{ optional($audiobook->created_at)->format('d M Y') }}
                            </p>
                        </div>

                    </div>

                </article>

            @endforeach

        </div>

        {{-- Empty State --}}
        @if ($audiobooks->isEmpty())
            <div class="py-16 text-center text-gray-500">
                <i class="fa-solid fa-book-open mb-3 text-3xl"></i>
                <p>Belum ada buku di library.</p>
            </div>
        @endif

    </div>
</div>

        </section>
    </div>
</x-layout>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    {{-- Success Modal --}}
    @if (session('pesan') == 'berhasil simpan data')
        <div id="successModal" class="fixed inset-0 z-[9999] flex items-center justify-center px-4">
            {{-- Backdrop --}}
            <div id="successBackdrop"
                 class="absolute inset-0 bg-black/40 opacity-0 backdrop-blur-sm transition-opacity duration-500"></div>

            {{-- Modal --}}
            <div id="successBox"
                 class="relative w-full max-w-sm translate-y-8 scale-75 rounded-[28px] bg-white p-8 text-center opacity-0 shadow-2xl transition-all duration-500 ease-out">

                {{-- Success Circle --}}
                <div class="relative mx-auto mb-6 flex h-24 w-24 items-center justify-center">
                    <div class="absolute inset-0 animate-pulse rounded-full bg-emerald-400/20 blur-xl"></div>

                    <div id="successCircle"
                         class="relative flex h-20 w-20 scale-0 items-center justify-center rounded-full bg-emerald-500">
                        <svg id="successCheck" class="h-10 w-10 text-white" viewBox="0 0 52 52" fill="none">
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

                <h2 id="successTitle" class="translate-y-3 text-2xl font-bold text-gray-900 opacity-0">
                    Berhasil!
                </h2>

                <p id="successText" class="mt-2 translate-y-3 text-sm leading-relaxed text-gray-500 opacity-0">
                    Data pribadi kamu berhasil disimpan.
                </p>

                <button
                    id="successButton"
                    type="button"
                    class="mt-7 w-full translate-y-3 rounded-2xl bg-gray-900 px-5 py-3 font-semibold text-white opacity-0 transition-all duration-200 hover:scale-[1.02] hover:bg-gray-800 active:scale-95"
                >
                    Mantap!
                </button>
            </div>
        </div>

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

                // Animasi modal masuk
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

    {{-- Letakkan script tambahan halaman ini di bawah jika diperlukan. --}}
@endsection
