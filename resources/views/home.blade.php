

<x-layout>

<div>
    <section id="landing-page" >
        <div class="flex justify-center mb-10 mt-5">
            <h1 class="text-4xl md:text-6xl text-center font-semibold max-w-5xl">
              A place you can grow with books around you
            </h1>
          </div>
          <div class="relative">
          <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 2000)">
            <span
                x-show="show"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-50"
                x-transition:enter-end="opacity-100 scale-100"
                class="absolute hidden md:block -top-10 right-32 sm:top-0 sm:right-24 md:top-0 md:right-44 bg-blue-500 text-white px-3 py-1 text-sm rounded-full rotate-12 z-10"
            >
                @fiction
            </span>
            <span
                x-show="show"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-50"
                x-transition:enter-end="opacity-100 scale-100"
                class="absolute -top-3 text-xs  left-12 sm:top-52 sm:left-24 md:top-52 md:left-96 bg-red-700 text-white px-3 py-1 md:text-sm rounded-full -rotate-6 md:rotate-0 "
            >
                #Psychology
            </span>
        </div>
    </div>

    <div class="flex justify-center mt-20">
        <div class="container_image">
            <div class="image" style="background-image: url('{{ asset('img/1.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/2.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/3.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/4.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/5.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/6.png') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/7.png') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/8.jpg') }}')"></div>
            <div class="image" style="background-image: url('{{ asset('img/9.jpg') }}')"></div>
        </div>

      </div>
      <div class="flex justify-center gap-4 mt-16 md:mt-36  md:pt-20">
        <a href="#library">
          <button class="bg-slate-800 rounded-lg px-3 py-1 text-white shadow-md hover:bg-slate-900 transform hover:scale-110 transition-all">
            Let's Read
          </button>
        </a>
        <a href="/login">
          <button class="border bg-white rounded-lg px-3 py-1 shadow-md hover:bg-gray-100 transform hover:scale-110 transition-all">
            Join Us
          </button>
        </a>
      </div>

    </section>

    <section id="library" class="py-10 md:mt-10">
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
  <section class="p-10">
    <div class="flex flex-col lg:flex-row justify-between items-center lg:items-start space-y-8 lg:space-y-0 lg:space-x-8 px-4 md:px-8">
        <!-- Text and Animation Section -->
        <div class="w-full lg:w-1/2 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-semibold">
                <span class="text-red-700">Doesn't have free time to read books? 🦊</span>
            </h1>
            <p class="text-base md:text-lg mt-4 " data-aos="zoom-in" data-aos-duration="500">
                Chill guys, just listen to our Audiobook.
            </p>
            <div class="flex justify-center  mt-6">
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

        <!-- Book List and Detail Section -->
        <div class="w-full lg:w-1/2" x-data="{
            books: [
              { id: 1, title: 'The Mountain Is You', author: 'Brianna Wiest', duration: '23 Menit', description: 'Sebuah panduan untuk mengatasi hambatan diri dan mencapai potensi maksimal.', img: 'img/buku1.png', audio: '{{ asset('audio/examplebook1.mp3') }}' },
              { id: 2, title: 'The First 20 Hours', author: 'Josh Kaufman', duration: '20 Menit', description: 'Buku inspiratif tentang cara menguasai keterampilan baru dengan cepat.', img: 'img/buku2.png', audio: '{{ asset('audio/examplebook2.mp3') }}' },
              { id: 3, title: 'Factfulness', author: 'Hans Rosling', duration: '25 Menit', description: 'Panduan memahami dunia dengan fakta, mengatasi kesalahpahaman, dan berpikir lebih jernih.', img: 'img/buku3.png', audio: '{{ asset('audio/examplebook3.mp3') }}' },
              { id: 4, title: 'Secrets of Divine Love', author: 'A. Helwa', duration: '30 Menit', description: 'Sebuah buku yang mendalam tentang spiritualitas dan hubungan dengan Tuhan.', img: 'img/buku4.png', audio: '{{ asset('audio/examplebook4.mp3') }}' },

              ],
            activeBook: null,
            audioPlayer: null,
            isPlaying: false,
            init() {
              this.activeBook = this.books[0];
              this.audioPlayer = new Audio(this.activeBook.audio); // Init audio player with the first book's audio
            },
            playAudio() {
              if (this.audioPlayer.paused) {
                this.audioPlayer.play();
                this.isPlaying = true; // Set isPlaying to true when audio is playing
              } else {
                this.audioPlayer.pause();
                this.isPlaying = false; // Set isPlaying to false when audio is paused
              }
            }
          }" x-init="init">
            <!-- Detail Section -->
            <div class="bg-purple-500 text-white p-6 rounded-lg max-w-lg mx-auto lg:mx-0 mb-6" x-show="activeBook" x-transition.opacity data-aos="fade-in" style="display: none;">
                <template x-if="activeBook">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start">
                        <img :src="activeBook.img" alt="" class="w-24 h-36 object-cover rounded mr-4 mb-4 sm:mb-0">
                        <div class="relative">
                            <h2 class="text-lg font-bold" x-text="activeBook.title"></h2>
                            <p class="text-sm mt-1" x-text="'📢 ' + activeBook.author"></p>
                            <p class="text-sm mt-1" x-text="'⏱ ' + activeBook.duration"></p>
                            <p class="mt-2 text-sm" x-text="activeBook.description"></p>

                            <!-- Play/Pause Button -->
                            <button @click="playAudio" class="absolute text-2xl top-2 right-5">
                                <!-- Toggle play/pause icon -->
                                <span x-show="!isPlaying">▶</span>
                                <span x-show="isPlaying">⏸</span>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
            <!-- Book List Section -->
            <div class="flex overflow-x-auto gap-4 py-4">
                <template x-for="(book, index) in books" :key="book.id">
                    <div class="flex-none cursor-pointer" @click="activeBook = book; audioPlayer.src = book.audio" data-aos="fade-up" :data-aos-delay="(index + 1) * 100">
                        <img :src="book.img" alt="" class="w-20 h-28 sm:w-24 sm:h-36 object-cover rounded border">
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>




<section>
<div class="container mx-auto px-6 pb-12 pt-6">
    <!-- Title Section -->
    <div class="text-center">
      <p class="text-base font-semibold text-red-700">Become Story Teller</p>
      <h1 class="mt-2 text-3xl sm:text-4xl font-bold tracking-tight">
        Every single of books <span class="relative inline-block text-lg md:text-2xl">✨</span><br> tells a story
      </h1>
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
  <span class="absolute bottom-16 left-10 text-2xl hidden md:block">📖</span>

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
