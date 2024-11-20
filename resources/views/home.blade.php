{{-- {{ dd($title) }} --}}

<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>

<div>
    <section id="landing-page">


    <div class="md:flex md:flex-row mb-10">


    <div class="m-2  basis-1/2 hidden md:block">
        <div class="flex justify-between mb-3">
        <div class="book-container ">
            <img class="book front  rounded-md " src="img/buku1.png" />
            <img class="book back rounded-md" src="img/buku2.png" />
        </div>
        <div class="book-container ">
            <img class="book front rounded-md border" src="img/buku3.png" />
            <img class="book back rounded-md border" src="img/buku4.png" />
        </div>
        <div class="book-container ">
            <img class="book front rounded-md border" src="img/buku5.png" />
            <img class="book back rounded-md border" src="img/buku6.png" />
        </div>
    </div>
    <div class="flex justify-between mb-3">
        <div class="book-container  ">
            <img class="book front rounded-md border" src="img/buku7.jpg" />
            <img class="book back rounded-md border" src="img/buku8.jpg" />
        </div>
        <div class="book-container">
            <img class="book front rounded-md border" src="img/buku9.jpg" />
            <img class="book back rounded-md border" src="img/buku10.jpg" />
        </div>
        <div class="book-container">
            <img class="book front rounded-md border" src="img/buku11.jpg" />
            <img class="book back rounded-md border" src="img/buku12.jpg" />
        </div>
    </div>
    </div>

    <div class="m-2 basis-1/2 " >
      <div class=" text-4xl lg:text-7xl font-serif p-5 ">

        <h1>SHARE THE</h1>
      <h1>INSIGHT FROM</h1>
      <h1>THE BOOK</h1>
      <h1>YOU WAS</h1>
      <h1>READ!</h1>

      </div>

      <div class="flex justify-center">
        <a href="#library" class="px-3 py-2 bg-slate-950 rounded-full  flex justify-between text-white  hover:translate-y-2 duration-300 ease-in-out shadow-md">Scroll  Down  <i class="fa-solid fa-arrow-down m-1" ></i></a>

      </div>
    </div>

      </div>
    </section>
    <div id="progress-bar-container">
    <div id="progress-bar"></div>
    <div id="progress-percent">  0% </div>
    </div>

    <section id="library" class="mb-28 my-10 rounded-lg p-2 ">

            <div class="flex justify-between gap-3 mt-10">
                <div class="basis-7/12 ">
                    <div class="flex justify-center">

                    <img class="h-20" src="{{ asset('img/logo.png') }}" alt="Your Company">
                    </div>
                    <div class="text-lg font-base pt-10">
                        <div class="flex justify-between">
                            <i class="fa-solid fa-book fa-2xl mt-10"></i><div class="px-3">
                                <h3 class="font-bold">Rangkuman Buku Terbaik</h3>
                                <p class="text-sm">Temukan esensi dari buku-buku favorit Anda dalam rangkuman singkat namun padat, yang mudah dipahami dan relevan untuk kehidupan sehari-hari.</p>
                            </div>
                        </div>
                        <div class="flex justify-between py-5">
                            <i class="fa-solid fa-ear-listen fa-2xl mt-10"></i><div class="px-3">
                                <h3 class="font-bold">Audiobook yang Memotivasi</h3>
                                <p class="text-sm"> Dengarkan cerita dan ide-ide hebat kapan saja, di mana saja. Pilihan sempurna untuk Anda yang ingin belajar sambil beraktivitas.</p>
                            </div>
                        </div>



                        <div class="flex justify-between py-5">
                            <i class="fa-solid fa-hourglass-half fa-2x mt-5"></i><div class="px-3">
                                <h3 class="font-bold">Belajar Tanpa Batas Waktu</h3>
                                <p class="text-sm"> Maksimalkan waktu Anda dengan konten yang dirancang untuk memperkaya wawasan, menginspirasi tindakan, dan membantu Anda mencapai tujuan.</p>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="basis-5/12 ">
                    <div class="justify-start grid grid-cols-2 gap-2 ">
                @foreach ($posts as $post)
                    <article class="flex-shrink-0 w-56 flex flex-col items-start justify-between border rounded-md p-5 bg-slate-100 hover:scale-110 transform transition duration-300 ease-in-out">
                        <div class="w-full mb-2">
                            <a href="/posts/{{ $post['id'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">
                            <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}" class="object-cover object-left-bottom w-full rounded-lg" alt="gambar"></a>
                        </div>
                        <div class="group relative"></div>

                        <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 my-1">Summarized by
                            <span class=" font-semibold text-gray-900 mx-2">{{ Str::limit( $post->author->name, 20 )}}</span>
                        </a>
                    </article>
              @endforeach
            </div>
                    </div>

            </div>



      </div>


      <div class="relative mt-10">
        <!-- Slider Container -->
        <div id="audiobook-slider" class="flex overflow-x-scroll scroll-smooth gap-4">
            @foreach ($audiobooks as $audiobook)
            <a href="{{ route('audiobooks.show', $audiobook->id) }}" class="block flex-shrink-0 w-80 p-4 border rounded">
                @if ($audiobook->cover)
                <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-46 mb-4 rounded-md">
                @endif
                <h2 class="font-bold mb-2">{{ $audiobook->title }}</h2>
                <p class="text-sm text-gray-600">Speaker: {{ $audiobook->speaker->name }}</p>
            </a>
            @endforeach
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
        @endif

        document.addEventListener('scroll', function () {
        const scrollTop = window.scrollY; // Jarak gulir dari atas
        const documentHeight = document.documentElement.scrollHeight; // Tinggi total dokumen
        const windowHeight = window.innerHeight; // Tinggi viewport

        // Hitung persentase scroll
        const scrollPercent = Math.round((scrollTop / (documentHeight - windowHeight)) * 100);

        // Perbarui tinggi progress bar
        document.getElementById('progress-bar').style.height = scrollPercent + '%';

        // Perbarui teks persentase
        document.getElementById('progress-percent').textContent = scrollPercent + '%';
    });


    </script>

    @endsection


</x-layout>
