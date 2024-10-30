{{-- {{ dd($title) }} --}}

<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>

<div>
    <section id="landing-page">


    <div class="md:flex md:flex-row mb-10">
      <div class="m-2 columns-3 basis-1/2 hidden md:block" >
      <img class="w-full p-1" src="img/buku1.png" />
      <img class="w-full p-1" src="img/buku2.png" />
      <img class="w-full p-1" src="img/buku3.png" />
      <img class="w-full p-1" src="img/buku4.png" />
      <img class="w-full p-1" src="img/buku5.png" />
      <img class="w-full p-1" src="img/buku6.png" />
    </div>
    <div class="m-2 basis-1/2 " >
      <div class=" text-4xl lg:text-7xl font-serif p-5 ">
      <h1>SHARE THE</h1>
      <h1>INSIGHT FROM</h1>
      <h1>THE BOOK</h1>
      <h1>YOU WAS</h1>
      <h1>READ</h1>

      </div>

      <div class="flex justify-center">
        <a href="#library" class="px-3 py-2 bg-slate-950 rounded-full  flex justify-between text-white  hover:translate-y-2 duration-300 ease-in-out shadow-md">Scroll  Down  <i class="fa-solid fa-arrow-down m-1" style="color: #ffffff;"></i></a>

      </div>
    </div>







      </div>
    </section>


    <section id="library" class="mb-28 my-10 rounded-lg p-2 ">


        <h1 class="text-3xl font-serif m-6 text-center my-2">Recomended for you</h1>

        <div class="relative mt-10">
          <!-- Slider Container -->
          <div id="slider" class="flex overflow-x-scroll scroll-smooth gap-3 ">
              @foreach ($posts as $post)
              <article class="flex-shrink-0 w-80 flex flex-col items-start justify-between border rounded-md p-5">
                  <div class="w-full mb-2">
                      <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}" class="object-cover object-left-bottom w-full rounded-lg" alt="gambar">
                  </div>
                  <div class="group relative"></div>
                  <div class="mt-1 items-center gap-x-4 w-full">
                      <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600 inline">
                          <a href="/posts/{{ $post['id'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">{{ Str::limit($post['title'], 20) }}</a>
                      </h3>
                  </div>
                  <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 mb-3 mt-1">Summarized by
                      <span class=" font-semibold text-gray-900 mx-2">{{ Str::limit( $post->author->name, 20 )}}</span>
                  </a>
              </article>
              @endforeach
          </div>

          <!-- Navigation Buttons -->
          <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-100  p-2 rounded-full hover:bg-gray-200 mx-3 ">
            <i class="fa-solid fa-chevron-left px-2 "></i>
          </button>
          <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-100   p-2 rounded-full hover:bg-gray-200 mx-3">
            <i class="fa-solid fa-chevron-right px-2"></i>
          </button>
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

        <!-- Navigation Buttons -->
        <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-100  p-2 rounded-full hover:bg-gray-200 mx-3 ">
          <i class="fa-solid fa-chevron-left px-2 "></i>
        </button>
        <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-100   p-2 rounded-full hover:bg-gray-200 mx-3">
          <i class="fa-solid fa-chevron-right px-2"></i>
        </button>
    </div>

    </section>

      <style>
          #slider {
              -ms-overflow-style: none;  /* Internet Explorer 10+ */
              scrollbar-width: none;  /* Firefox */
          }

          #slider::-webkit-scrollbar {
              display: none;  /* Safari and Chrome */
          }
          #audiobook-slider {
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;  /* Firefox */
}

#audiobook-slider::-webkit-scrollbar {
    display: none;  /* Safari and Chrome */
}

      </style>





          {{-- <div class="flex flex-col rounded-md border p-3">
            <a href="" class="font-bold text-2xl  hover:underline ">Good Vibes Good Life</a>
            <p class="text-xs mb-2">by: Anonim </p>
            <p class="text-sm ">Hidup cuma sekali mari berikan vibrasi yang baik. vibrasi layaknya sebuah frekuensi yang tak kelihatan tapi itu ada, seperti garpu tala, garpu tala yang mempunyai frekuensi yang sama akan terhubung dengan garpu tala yang sama</p>
            <div class="flex mt-3 justify-between">
              <i class="fa-solid fa-heart"><span class="text-sm px-2">232</span></i>
              <i class="fa-solid fa-bookmark"><span class="text-sm px-2">21</span></i>
            </div>
            <span class="flex justify-end mr-5 py-5">
              <a href="" class="bg-gray-950 text-white px-3 py-2 rounded-full text-sm hover:translate-x-2 duration-300 ease-in-out">Start Reading <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></a>
            </span>
          </div>

          --}}



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
    </script>
    @endsection


</x-layout>
