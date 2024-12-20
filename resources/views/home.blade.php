

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
        <div class="image" style="background-image: url('img/8.jpg')"></div>
        <div class="image" style="background-image: url('img/9.jpg')"></div>

      </div>
      </div>
      <div class="flex justify-center gap-4 md:mt-56">
        <a href="#library">
          <button class="bg-slate-900 rounded-full px-3 py-1 text-white shadow-md hover:bg-slate-700 transform hover:scale-110 transition-all">
            Let's Read
          </button>
        </a>
        <a href="/login">
          <button class="border bg-gray-100 rounded-full px-3 py-1 shadow-md hover:bg-gray-300 transform hover:scale-110 transition-all">
            Join Us
          </button>
        </a>
      </div>

    </section>

    <section id="library" class="py-10 mt-10">
      <div class="flex flex-col lg:flex-row justify-between items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-10 px-4 md:px-8" data-aos="fade-up">
          <!-- Text and Testimonial Section -->
          <div class="text-center lg:text-left max-w-lg">
              <h1 class="text-xl md:text-3xl lg:text-4xl font-semibold">
                  <span class="text-red-700">"Curious about something?🧐 </span>Explore with a variety of genres we offer!"
              </h1>
              <div class="bg-white p-6 rounded-lg shadow-lg mt-6" data-aos="fade-up" data-aos-delay="100">
                  <p class="text-base md:text-lg text-gray-700 italic">"Website ini memudahkan saya menemukan buku-buku yang saya cari. Fitur pencarian dan rekomendasinya sangat berguna!"</p>
                  <p class="mt-4 text-sm text-gray-600 text-right">- John Doe, Pengguna Setia</p>
              </div>
          </div>

          <!-- Image Grid Section -->
          <div class="grid grid-cols-2 gap-4 w-full sm:max-w-sm md:max-w-md lg:max-w-lg">
              <div data-aos="fade-up" data-aos-delay="100">
                  <img src="{{ asset('img/1.jpg') }}" alt="Image 1" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md">
              </div>
              <div data-aos="fade-up" data-aos-delay="200">
                  <img src="{{ asset('img/2.jpg') }}" alt="Image 2" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md">
              </div>
              <div data-aos="fade-up" data-aos-delay="300">
                  <img src="{{ asset('img/3.jpg') }}" alt="Image 3" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md">
              </div>
              <div data-aos="fade-up" data-aos-delay="400">
                  <img src="{{ asset('img/4.jpg') }}" alt="Image 4" class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md">
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
            <p class="text-lg mt-5 text-center font-inter"  data-aos="zoom-in" data-aos-duration="500">Chill guys , Just listen our Audiobook
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
            init() {
              // Set buku pertama sebagai default saat halaman dimuat
              this.activeBook = this.books[0];
            }
          }" x-init="init">
            <div class="flex flex-col items-center space-y-4 relative" >
              <!-- Detail Section -->
              <div
                class="bg-purple-500 text-white p-6 rounded-lg max-w-md transition-opacity duration-300 absolute "
                x-show="activeBook"
                x-transition.opacity
                style="display: none;"
                data-aos="fade-in" >
                <template x-if="activeBook">
                  <div>
                    <div class="flex justify-between">
                      <img :src="activeBook.img" alt="" class="w-24 h-36 object-cover rounded mr-4 ">
                      <div class="mt-4">
                        <h2 class="text-lg font-bold" x-text="activeBook.title"></h2>
                        <p class="text-sm" x-text="'📢 ' + activeBook.author"></p>
                        <p class="text-sm mt-1" x-text="'⏱ ' + activeBook.duration"></p>
                        <p class="mt-2 text-sm line-clamp-2" x-text="activeBook.description"></p>
                      </div>
                    </div>
                  </div>
                </template>
              </div>

              <!-- Book List Section -->
              <div class="flex space-x-4 pt-52" >
  <template x-for="(book, index) in books" :key="book.id">
    <div class="cursor-pointer" @click="activeBook = book" data-aos="fade-up" :data-aos-delay="(index + 1) * 100">
      <img :src="book.img" alt="" class="w-24 h-36 object-cover rounded border">
    </div>
  </template>
</div>

            </div>
          </div>

    </div>

</div>
</section>

<section>
<div class="container mx-auto px-6 pb-12 pt-6">
    <!-- Title Section -->
    <div class="relative text-center">
      <p class="text-base font-semibold  text-red-700">Become Story Teller</p>
      <h1 class="mt-2 text-4xl font-bold tracking-tight">Every single of books <span class="absolute text-lg top-6">✨</span>  <br> tells a story</h1>
    </div>
<div class="relative flex justify-center">
    <!-- Content Section -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-3 items-center max-w-xl">
      <!-- Left Card -->
      <a href="/login">
      <div class="bg-white rounded-lg shadow-lg p-4 relative border transform -rotate-6 hover:scale-105 duration-300">
        <div class="flex">
          <img src="{{ asset('img/contributor.jpg') }}" alt="Art" class="rounded-md">
          <div class="ml-4 relative">
            <span class="absolute -top-2 right-2 bg-blue-500 text-white px-3 py-1 text-sm rounded-full">@booklover</span>
          </div>
        </div>
        <h2 class="mt-4 text-xl font-semibold text-center">Contributor</h2>
        <p class="text-gray-600 mt-2">Offering book-reader a chance to own a piece of that narrative...</p>
      </div>
    </a>

      <!-- Right Card -->
    <a href="/login">
      <div class="bg-red-700 rounded-lg shadow-lg p-4  transform rotate-6 hover:scale-105 duration-300">
        <div class="relative">
          <img src="{{ asset('img/podcaster.jpg') }}" alt="Art" class="rounded-md">
        </div>
        <h2 class="mt-4 text-xl font-semibold text-white text-center">Be Podcaster</h2>
        <p class="text-white  mt-2">Artistic spirit with commercial viability, creativity...</p>
      </div>
    </a>
    </div>
      <!-- Icons as Ornaments -->
  <span class="absolute top-24 right-16 text-2xl ">🎨</span>
  <span class="absolute bottom-16 left-10 text-2xl">📖</span>

</div>
  </div>
</section>

<section>
    <div class="max-w-xl mx-auto bg-white shadow rounded-lg my-8">
        <h1 class="text-2xl font-bold text-center py-4">Do you have any questions?</h1>

        <div x-data="{ open: null }" class="space-y-2">

          <!-- Accordion Item 1 -->
          <div class=" rounded">
            <button
              @click="open === 1 ? open = null : open = 1"
              class="w-full flex justify-between items-center p-4 text-left text-gray-900 font-medium focus:outline-none">
              What can this platform do for me?
              <span x-text="open === 1 ? '-' : '+'"></span>
            </button>
            <div x-show="open === 1" class="px-4 pb-4 text-gray-600">
              this platform provides summaries of books to help you learn faster and more efficiently.
            </div>
          </div>

          <!-- Accordion Item 2 -->
          <div class=" rounded">
            <button
              @click="open === 2 ? open = null : open = 2"
              class="w-full flex justify-between items-center p-4 text-left text-gray-900 font-medium focus:outline-none">
              How can I use this platform?
              <span x-text="open === 2 ? '-' : '+'"></span>
            </button>
            <div x-show="open === 2" class="px-4 pb-4 text-gray-600">
              You can use this platform via their app or website for quick access to summaries.
            </div>
          </div>

          <!-- Accordion Item 3 -->
          <div class=" rounded">
            <button
              @click="open === 3 ? open = null : open = 3"
              class="w-full flex justify-between items-center p-4 text-left text-gray-900 font-medium focus:outline-none">
              What's included in a plan?
              <span x-text="open === 3 ? '-' : '+'"></span>
            </button>
            <div x-show="open === 3" class="px-4 pb-4 text-gray-600">
              A this platform plan includes access to all book summaries, offline mode, and additional features.
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
