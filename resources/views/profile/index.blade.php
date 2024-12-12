<x-layout class="">
    @if (session('success'))
    <div class="text-green-500 text-center mt-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="text-red-500 text-center mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="">

    <div class=" mx-auto w-full border rounded-lg overflow-hidden border">
        <!-- Header Section -->
        <div class="w-full overflow-hidden ">
            <img
                src="{{ asset('img/banner.jpg') }}"
                alt="Banner"
                class="w-full h-auto max-h-38 md:max-h-38 lg:max-h-48 object-cover">
        </div>


<div class="flex  w-full border">
        <!-- Profile Image -->
        <div class="relative  ml-5 flex justify-start lg:-mt-10 mb-5 mx-5">
            <button id="openModal" class="absolute top-0 right-8 bg-white text-black p-1 rounded-full shadow-md">
                <i class="fas fa-edit m-1"></i>
            </button>
            <img class="relative w-20 h-20 lg:w-40 lg:h-40 rounded-full  border-1 lg:border-4 border-yellow-500 -top-6"  src="{{ Auth::user()->profile_photo ? asset('storage/profile_photos/' . Auth::user()->profile_photo) : asset('img/avatar1.jpg') }}" alt="Profile Picture">

          <div class=" px-6 lg:pt-10 w-full text-sm  flex justify-between ">
            <div>
            <h2 class="mt-3 lg:bg text-lg lg:text-xl font-semibold text-gray-800"> {{ $user->name }}</h2>
            <p class="text-gray-600">🏳 Indonesia </p>

            <p class="text-gray-600 mt-2 italic">{{ $user->bio }}</p>
             <div class="mt-5 flex justify-start  text-sm gap-3 text-center ">
            <!-- Followers Section -->
            <div x-data="{ showFollowers: false }">
                <h2
                    class="bg-blue-300 px-2 py-1 rounded-md cursor-pointer"
                    @click="showFollowers = !showFollowers"
                >
                    Followers ({{ $followers->count() }})
                </h2>
                <ul x-show="showFollowers" class="mt-2">
                    @foreach($followers as $follower)
                        <li class="py-1 border-b">{{ $follower->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Following Section -->
            <div x-data="{ showFollowing: false }">
                <h2
                    class="bg-yellow-300 ml-2 px-2 py-1 rounded-md cursor-pointer"
                    @click="showFollowing = !showFollowing"
                >
                    Following ({{ $following->count() }})
                </h2>
                <ul x-show="showFollowing" class="mt-2">
                    @foreach($following as $followedUser)
                        <li class="py-1 border-b">{{ $followedUser->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

         </div>
         <div class="px-6 pt-7 flex flex-row justify-start ">
            <!-- Genre Section -->
            <div class="gap-2 mx-2 mb-4  w-full sm:w-auto">
              <h3 class="text-md font-semibold text-gray-800 mb-2">Interest Genre</h3>
              <div class="flex flex-wrap gap-2">
                @if ($interestGenres->isEmpty())
                <p>You have no interest genres yet.</p>
            @else
                @foreach ($interestGenres as $genre)
                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">{{ $genre->genre }}</span>
                @endforeach
                @endif
              </div>

            </div>
            <!-- Author Section -->
            <div class="gap-2 mx-2 mb-4  w-full sm:w-auto">
              <h3 class="text-md font-semibold text-gray-800 mb-2">Author Kesukaan</h3>
              @if ($favoriteAuthors->isEmpty())
              <p>You have no interest genres yet.</p>
          @else
              @foreach ($favoriteAuthors as $author)
              <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">{{ $author->favorite_author }}</span>
              @endforeach
              @endif
            </div>
          </div>
        </div>
    </div>
 </div>



          <div class="p-4  w-full my-2 rounded-lg">
<!-- Modal Background -->
<div id="favoriteBookModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex justify-center items-center z-50">
    <!-- Modal Content -->
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-lg font-bold mb-4">Add Favorite Book</h2>

        <form method="POST" action="{{ route('favorite_books.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Favorite Book Image -->
            <div class="mb-4">
                <label for="favorite_book_image" class="block text-sm font-medium text-gray-700">Book Image</label>
                <input type="file" name="favorite_book_image" id="favorite_book_image" class="mt-1 block w-full">
            </div>

            <!-- Favorite Book Title -->
            <div class="mb-4">
                <label for="favorite_book_title" class="block text-sm font-medium text-gray-700">Book Title</label>
                <input type="text" name="favorite_book_title" id="favorite_book_title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Favorite Book Rate -->
            <div class="mb-4">
                <label for="favorite_book_rate" class="block text-sm font-medium text-gray-700">Book Rate</label>
                <input type="number" name="favorite_book_rate" id="favorite_book_rate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" min="0" max="5" required>
            </div>

            <!-- Favorite Book Description -->
            <div class="mb-4">
                <label for="favorite_book_description" class="block text-sm font-medium text-gray-700">Book Description</label>
                <textarea name="favorite_book_description" id="favorite_book_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-3 py-1 rounded-md mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md">Save</button>
            </div>
        </form>
        </div>
        </div>
        </div>

      </div>


    <div class="flex justify-center mb-5 ">

        <!-- Modal -->
        <div id="profileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-5 rounded-lg shadow-lg w-96">
                <h2 class="text-center font-semibold text-lg mb-4">Edit Profile</h2>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $user->bio }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <div class="container mx-auto p-4">
        <!-- Section Wrapper -->
        <div class="flex flex-col md:flex-row gap-4">
          <!-- Posts Section -->
          <div class="rounded-md border p-4 md:w-2/4" x-data="{ showAll: false }">
            <h2 class="text-center font-semibold text-lg mb-4">Rangkuman yang di Post</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              @if($posts->isEmpty())
                <p class="col-span-full text-center text-gray-500">You have no posts.</p>
              @else
                @foreach($posts as $key => $post)
                  <div
                    class="bg-gray-100 shadow-md rounded-md p-4"
                    x-show="showAll || {{ $key }} < 3"
                    x-cloak>
                    <div class="h-60 w-full overflow-hidden rounded-md mb-4">
                      <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}"
                           alt="{{ $post->title }}"
                           class="h-full w-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $post->title }}</h3>
                    <p class="text-gray-600">{!! Str::limit($post->body, 20) !!}</p>
                    <small class="text-gray-500 block mt-2">Posted on {{ $post->created_at->format('d M Y') }}</small>
                  </div>
                @endforeach
              @endif
            </div>

            <div class="text-center mt-4">
              <button
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                x-show="!showAll"
                @click="showAll = true"
                x-cloak>
                Show All
              </button>
              <button
                class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600"
                x-show="showAll"
                @click="showAll = false"
                x-cloak>
                Show Less
              </button>
            </div>
          </div>


          <!-- Audiobooks Section -->
          <div class="rounded-md border p-4 md:w-2/4" x-data="{ showAll: false }">
            <h2 class="text-center font-semibold text-lg mb-4">Audiobook yang Dipost</h2>
            <div class="space-y-4 grid grid-cols-2">
              @if($audiobooks && $audiobooks->isNotEmpty())
                @foreach($audiobooks as $key => $audiobook)
                  <div
                    class="p-4 border bg-gray-50 rounded-md shadow-sm m-2"
                    x-show="showAll || {{ $key }} < 2"
                    x-cloak>
                    <div class="h-46 w-full overflow-hidden rounded-md mb-4">
                      <img src="{{ asset('storage/' . $audiobook->cover) }}"
                           alt="Cover of {{ $audiobook->title }}"
                           class="h-full w-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $audiobook->title }}</h3>
                  </div>
                @endforeach
              @else
                <p class="text-center text-gray-500 col-span-full">No audiobooks found.</p>
              @endif
            </div>

            <div class="text-center mt-4">
              <button
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"
                x-show="!showAll"
                @click="showAll = true"
                x-cloak>
                Show More
              </button>
              <button
                class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600"
                x-show="showAll"
                @click="showAll = false"
                x-cloak>
                Show Less
              </button>
            </div>
          </div>

        </div>
      </div>
</div>


<script>
    function openModal() {
        document.getElementById('favoriteBookModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('favoriteBookModal').classList.add('hidden');
    }

    document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.mySwiper', {
        slidesPerView: 1, // Default untuk mobile
        spaceBetween: 10, // Jarak antar slide
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: { // Untuk layar lebih dari 640px (tablet kecil)
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: { // Untuk layar lebih dari 768px (tablet besar)
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: { // Untuk layar lebih dari 1024px (desktop)
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
    });
});


</script>

</x-layout>
