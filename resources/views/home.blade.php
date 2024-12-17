

<x-layout>

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
                    <a href="{{ route('audiobooks.show', $audiobook->id) }}"
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


</x-layout>
