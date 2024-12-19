

<x-layout>

<div>
    <section id="landing-page">
        <div class="flex justify-center mb-10 mt-5">
            <h1 class="text-4xl md:text-6xl text-center font-semibold max-w-5xl">
              A place you can grow with books around you
            </h1>
          </div>

    <div class="flex justify-center mt-20">
      <div class="container_image">
        <!-- Tambahkan URL gambar di sini -->
        <div class="image" style="background-image: url('img/1.jpg')"></div>
        <div class="image" style="background-image: url('img/2.jpg')"></div>
        <div class="image" style="background-image: url('img/3.jpg')"></div>
        <div class="image" style="background-image: url('img/4.jpg')"></div>
        <div class="image" style="background-image: url('img/5.jpg')"></div>
        <div class="image" style="background-image: url('img/6.png')"></div>
        <div class="image" style="background-image: url('img/7.png')"></div>
      </div>
      </div>
      <div class="flex justify-center gap-4 mt-56 ">
        <button class="bg-slate-900 rounded-full px-3 py-1 text-white shadow-md">Lets Read</button>
        <button class="border bg-gray-100 rounded-full px-3 py-1 shadow-md">Join Us</button>
      </div>
    </section>
    <div id="progress-bar-container">
        <div id="progress-bar" class="hidden md:block"></div>
        <div id="progress-percent" class=" mix-blend-difference">  0% </div>
    </div>

    <section id="library" class="py-10 mt-5" >
        <div class="flex justify-evenly" data-aos="fade-up">
        <div >
            <h1 class="text-4xl font-semibold max-w-xl ">
                <span class="text-red-700 "> "Curious about something?🧐 </span>Explore with a variety of genres we offer!"
            </h1>
            <div  class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto mt-10" data-aos="fade-up" data-aos-delay="100">
                <p class="text-lg text-gray-700 italic">"Website ini memudahkan saya menemukan buku-buku yang saya cari. Fitur pencarian dan rekomendasinya sangat berguna!"</p>
                <p class="mt-4 text-sm text-gray-600 text-right">- John Doe, Pengguna Setia</p>
            </div>
        </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4">
                <div data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('img/1.jpg') }}" alt="Image 1" class="w-full h-48 object-cover rounded-md">
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/2.jpg') }}" alt="Image 2" class="w-full h-48 object-cover rounded-md">
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('img/3.jpg') }}" alt="Image 3" class="w-full h-48 object-cover rounded-md">
                </div>
                <div data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('img/4.jpg') }}" alt="Image 4" class="w-full h-48 object-cover rounded-md">
                </div>
            </div>
        </div>
    </section>
<section class="py-10">
    <div class="flex justify-evenly ">
        <div class="w-2/4" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-4xl font-semibold text-start pl-10">
                <span class="text-red-700">Doesn't have free time to read books? 🦊</span>
            </h1>
            <p class="text-lg mt-5 text-center"  data-aos="zoom-in" data-aos-duration="500">Chill guys, Just listen our Audiobook
            </p>
            <div class="flex justify-center" >


            <lottie-player
            src="{{ asset('js/woman-reading-book-under-the-tree.json') }}"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px;"
            loop
            autoplay>
        </lottie-player>
    </div>
        </div>
    <div class="w-2/4 gap-y-3">
        {{-- <div class="flex items-center gap-4 p-2 rounded-lg shadow-lg bg-slate-900 text-white mb-3" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
            <!-- Gambar Buku -->
            <div class="w-40">
                <img src="{{ asset('img/1.jpg') }}" alt="Book Cover" class="w-full h-full object-cover rounded-lg border border-blue-300">
            </div>
            <!-- Deskripsi Buku -->
            <div class="flex flex-col">
                <p class="flex items-center gap-2 text-lg font-bold">
                    <span class="inline-block w-4 h-4">
                        <i class="fa-solid fa-microphone-lines"></i>
                    </span>
                    Maulana
                </p>
                <p class="flex items-center gap-2 text-sm">
                    <span class="inline-block w-4 h-4">
                        <i class="fa-solid fa-clock"></i>
                    </span>
                    23 Menit
                </p>
                <p class="flex items-center gap-2 text-sm">
                    <span class="inline-block w-4 h-4">
                        <!-- Icon Book -->
                        <i class="fa-solid fa-book-open"></i>
                    </span>
                    Menjadi salah satu buku keuangan yang diterbitkan di abad 20 membuat buku ini best seller dan sangat relevan.
                </p>
            </div>
        </div> --}}

        <div x-data="{
            books: [
              {
                id: 1,
                title: 'The Psychology of Money',
                author: 'Morgan Housel',
                duration: '23 Menit',
                description: 'Menjadi salah satu buku keuangan yang diterbitkan di abad 20 membuat buku ini best seller dan sangat relevan',
                img: 'img/buku1.png',
              },
              {
                id: 2,
                title: 'Secrets of Divine Love',
                author: 'A. Helwa',
                duration: '30 Menit',
                description: 'Sebuah buku yang mendalam tentang spiritualitas dan hubungan dengan Tuhan.',
                img: 'img/buku2.png',
              },
              {
                id: 3,
                title: 'The Mountain Is You',
                author: 'Brianna Wiest',
                duration: '25 Menit',
                description: 'Sebuah panduan untuk mengatasi hambatan diri dan mencapai potensi maksimal.',
                img: 'img/buku3.png',
              },
              {
                id: 4,
                title: 'Love for Imperfect Things',
                author: 'Haemin Sunim',
                duration: '20 Menit',
                description: 'Cara menerima diri sendiri di dunia yang selalu menuntut kesempurnaan.',
                img: 'img/buku4.png',
              },
            ],
            activeBook: null,
          }">
            <div class="flex flex-col items-center space-y-4 relative">
              <!-- Detail Section -->
              <div
                class="bg-purple-500 text-white p-6 rounded-lg w-96 transition-opacity duration-300 absolute top-0"
                x-show="activeBook"
                x-transition.opacity
                style="display: none;">
                <template x-if="activeBook">
                  <div>
                    <!-- Close Button -->
                    <button
                      @click="activeBook = null"
                      class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full text-sm hover:bg-red-600">
                      ✕
                    </button>

                    <img :src="activeBook.img" alt="" class="w-24 h-36 object-cover rounded">
                    <div class="mt-4">
                      <h2 class="text-lg font-bold" x-text="activeBook.title"></h2>
                      <p class="text-sm" x-text="'📢 ' + activeBook.author"></p>
                      <p class="text-sm mt-1" x-text="'⏱ ' + activeBook.duration"></p>
                      <p class="mt-2 text-sm" x-text="activeBook.description"></p>
                    </div>
                  </div>
                </template>
              </div>

              <!-- Book List Section -->
              <div class="flex space-x-4 pt-40">
                <template x-for="book in books" :key="book.id">
                  <div class="cursor-pointer" @click="activeBook = book">
                    <img :src="book.img" alt="" class="w-24 h-36 object-cover rounded border">
                  </div>
                </template>
              </div>
            </div>
          </div>

    </div>

</div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();  // Inisialisasi AOS
    </script>


</x-layout>
<x-footer/>
