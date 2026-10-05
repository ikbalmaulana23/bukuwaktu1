

<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>

<div>
    <section id="landing-page">


    <div class="md:flex md:flex-row mb-10">


    <div class="m-2  basis-1/2 hidden md:block">
        <div class="flex justify-between mb-3">
        <div class="book-container ">
            <img class="book front  rounded-md " src="{{ asset('img/buku1.png') }}" />
            <img class="book back rounded-md" src="{{ asset('img/buku2.png') }}" />
        </div>
        <div class="book-container ">
            <img class="book front rounded-md border" src="{{ asset('img/buku3.png') }}" />
            <img class="book back rounded-md border" src="{{ asset('img/buku4.png') }}" />
        </div>
        <div class="book-container ">
            <img class="book front rounded-md border" src="{{ asset('img/buku5.png') }}" />
            <img class="book back rounded-md border" src="{{ asset('img/buku6.png') }}" />
        </div>
    </div>
    <div class="flex justify-between mb-3">
        <div class="book-container  ">
            <img class="book front rounded-md border" src="{{ asset('img/buku7.jpg') }}" />
            <img class="book back rounded-md border" src="{{ asset('img/buku8.jpg') }}" />
        </div>
        <div class="book-container">
            <img class="book front rounded-md border" src="{{ asset('img/buku9.jpg') }}" />
            <img class="book back rounded-md border" src="{{ asset('img/buku10.jpg') }}" />
        </div>
        <div class="book-container">
            <img class="book front rounded-md border" src="{{ asset('img/buku11.jpg') }}" />
            <img class="book back rounded-md border" src="{{ asset('img/buku12.jpg') }}" />
        </div>
    </div>
    </div>

    <div class="m-2 basis-1/2 " >
      <div class=" text-4xl lg:text-7xl font-serif p-3 ">
        <h1>SHARE THE</h1>
         <h1>INSIGHT FROM</h1>
        <h1 class="inline-block relative highlight-text">THE BOOK</h1>
         <h1>YOU </h1>
        <h1>READ</h1>
 </div>

      <div class="flex justify-center mt-3">
        <a href="#library" class="px-3 py-2 bg-slate-950 rounded-full  flex justify-between text-white  hover:translate-y-3 duration-300 ease-in-out shadow-md">Scroll  Down  <i class="fa-solid fa-arrow-down m-1" ></i></a>

      </div>
    </div>

      </div>
    </section>
    <div id="progress-bar-container">
    <div id="progress-bar" class="hidden md:block"></div>
    <div id="progress-percent" class=" mix-blend-difference">  0% </div>
    </div>

    <section id="library" class="mt-10 rounded-lg p-2 ">
        <div class="flex items-center justify-center ">
            <div class="relative w-72 h-10 flex justify-center ">
                <i class="fa-solid fa-star-of-life fa-spin absolute top-0 left-0 text-yellow-500 text-xl"></i>
                <h1 class="text-center font-bold font-sans text-4xl relative z-10">BUKU WAKTU</h1>
                <i class="fa-regular fa-bookmark absolute top-5 right-0 transform -translate-y-1/2 text-blue-600 text-2xl"></i>
               </div>

        </div>
        {{-- <div class="flex justify-center">
        <h1 class="text-center highlight-text font-sans"> - Baca Kapanpun, dan dimanapun -</h1>
    </div> --}}


        <div class="flex flex-col lg:flex-row justify-between gap-3 mt-20">
            <!-- Bagian Kiri -->
            <div class="basis-full lg:basis-7/12 p-4">
                <div class="text-lg font-base">
                    <!-- Rangkuman Buku -->
                    <div class="flex flex-col sm:flex-row items-start gap-4 py-5 border-b">
                        <img class="w-36 h-auto" src="img/man&book.png" alt="">
                        <div>
                            <h3 class="font-bold">Rangkuman Buku Terbaik</h3>
                            <p class="text-sm">
                                Temukan esensi dari buku-buku favorit Anda dalam rangkuman singkat namun padat,
                                yang mudah dipahami dan relevan untuk kehidupan sehari-hari.
                            </p>
                        </div>
                    </div>
                    <!-- Audiobook -->
                    <div class="flex flex-col sm:flex-row items-start gap-4 py-5 border-b">
                        <img class="w-36 h-auto" src="img/listening.png" alt="">
                        <div>
                            <h3 class="font-bold">Audiobook yang Memotivasi</h3>
                            <p class="text-sm">
                                Dengarkan cerita dan ide-ide hebat kapan saja, di mana saja.
                                Pilihan sempurna untuk Anda yang ingin belajar sambil beraktivitas.
                            </p>
                        </div>
                    </div>
                    <!-- Belajar Tanpa Batas -->
                    <div class="flex flex-col sm:flex-row items-start gap-4 py-5">
                        <img class="w-36 h-auto" src="img/time.png" alt="">
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

            <!-- Bagian Kanan -->
            <div class="basis-full lg:basis-5/12 p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($posts as $post)
                        <article class="flex-shrink-0 border rounded-md p-4 bg-slate-100 hover:scale-105 transform transition duration-300 ease-in-out">
                            <!-- Gambar -->
                            <div class="w-full mb-3">
                                <a href="/posts/{{ $post['slug'] }}" class="block">
                                    <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}"
                                         class="object-cover w-full h-36 rounded-lg" alt="gambar">
                                </a>
                            </div>
                            <!-- Teks -->
                            <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600">
                                Summarized by
                                <span class="font-semibold text-gray-900 mx-1">
                                    {{ Str::limit($post->author->name, 20) }}
                                </span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>


     <div class="mb-16 h-96 relative rounded-lg">
        <div class="flex justify-center">
            <h1 class="text-4xl font-bold text-center pt-5 inline-block relative highlight-text">#dibacainbuku</h1>
        </div>

        <p  class="text-center pb-5">baca buku lebih <span class="font-serif italic"> mudah</span>, karena kita lebih<span class="inline-block relative highlight-text">dekat</span></p>
             <i class="fa-solid fa-hourglass-start fa-spin-pulse absolute -top-2  right-5"></i>
             <i class="fa-solid fa-hourglass-start fa-spin-pulse absolute -bottom-2  left-5"></i>

             <div class="flex justify-center ">
                <div class="flex justify-center grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 p-4 w-max">
                    @foreach ($audiobooks as $audiobook)
                    <a href="{{ route('audiobook.show', $audiobook->id) }}"
                       class="p-2 border rounded-lg shadow-sm hover:shadow-md transform transition-transform duration-300 hover:scale-105 hover:bg-gray-50">
                        @if ($audiobook->cover)
                        <img src="{{ asset('storage/' . $audiobook->cover) }}"
                             alt="Cover of {{ $audiobook->title }}"
                             class="w-40 h-40 object-cover rounded-md mb-2">
                        @endif
                        <div class="text-center">
                            <h2 class="text-sm font-medium">{{ Str::limit($audiobook->title, 20, '...') }}</h2>
                            <p class="text-xs text-gray-500">Speaker: {{ Str::limit($audiobook->speaker->name, 15, '...') }}</p>
                        </div>

                    </a>
                    @endforeach
                </div>
            </div>



    </div>

    </section>


</div>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

   {{-- Success Modal --}}
@if(session('pesan') == 'berhasil simpan data')

    <div
        id="successModal"
        class="fixed inset-0 z-[9999] flex items-center justify-center px-4"
    >
        {{-- Backdrop --}}
        <div
            id="successBackdrop"
            class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-500"
        ></div>

        {{-- Modal --}}
        <div
            id="successBox"
            class="relative w-full max-w-sm rounded-[28px] bg-white p-8 text-center shadow-2xl
                   opacity-0 scale-75 translate-y-8
                   transition-all duration-500 ease-out"
        >

            {{-- Success Circle --}}
            <div class="relative mx-auto mb-6 flex h-24 w-24 items-center justify-center">

                {{-- Glow --}}
                <div
                    class="absolute inset-0 rounded-full bg-emerald-400/20 blur-xl
                           animate-pulse"
                ></div>

                {{-- Circle --}}
                <div
                    class="relative flex h-20 w-20 items-center justify-center
                           rounded-full bg-emerald-500
                           scale-0"
                    id="successCircle"
                >
                    {{-- Check --}}
                    <svg
                        id="successCheck"
                        class="h-10 w-10 text-white"
                        viewBox="0 0 52 52"
                        fill="none"
                    >
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

            {{-- Text --}}
            <h2
                id="successTitle"
                class="text-2xl font-bold text-gray-900 opacity-0 translate-y-3"
            >
                Berhasil!
            </h2>

            <p
                id="successText"
                class="mt-2 text-sm leading-relaxed text-gray-500 opacity-0 translate-y-3"
            >
                Data pribadi kamu berhasil disimpan.
            </p>

            {{-- Button --}}
            <button
                id="successButton"
                type="button"
                class="mt-7 w-full rounded-2xl bg-gray-900 px-5 py-3
                       font-semibold text-white
                       opacity-0 translate-y-3
                       transition-all duration-200
                       hover:scale-[1.02] hover:bg-gray-800
                       active:scale-95"
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
            const text = document.getElementById('successText');
            const button = document.getElementById('successButton');

            // Modal masuk
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

                // Circle
                setTimeout(() => {
                    circle.classList.remove('scale-0');
                    circle.classList.add('scale-100');
                }, 250);

                // Check
                setTimeout(() => {
                    check.style.strokeDashoffset = '0';
                }, 350);

                // Text
                setTimeout(() => {
                    title.classList.remove('opacity-0', 'translate-y-3');
                    text.classList.remove('opacity-0', 'translate-y-3');
                }, 550);

                // Button
                setTimeout(() => {
                    button.classList.remove('opacity-0', 'translate-y-3');
                }, 700);
            });

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

    @endif

    // script scroll kamu...
</script>

    @endsection


</x-layout>
