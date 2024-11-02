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
    <div class=" mx-auto w-full bg-white border rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="bg-cover bg-center h-24" style="">
            <img src="{{ asset('img/banner.jpg')  }}" alt="">
        </div>

        <!-- Profile Image -->
        <div class="relative mt-12 ml-5 flex justify-start">
            <button id="openModal" class="absolute top-0 right-1/4 bg-white text-black p-1 rounded-full shadow-md">
                <i class="fas fa-edit m-1"></i>
            </button>
            <img class="w-40 h-40 rounded-full border-4 border-yellow-500" src="{{ asset('img/avatar1.jpg')  }}" alt="Profile Picture">

          <div class=" px-6 pt-16 w-full">
            <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
            <p class="text-gray-600">🏳 Indonesia </p>

            <p class="text-gray-600 mt-2 italic">{{ $user->bio }}</p>
             </div>

        </div>
        <div class=" px-6 pt-7 mb-10  flex justify-start ">
             <div class=" gap-2 mx-2">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Interest Genre</h3>
              <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs  ">Fiction</span>
              <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Poem</span>
              <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Bibliography</span>
              <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">+3 more</span>
            </div>
            <div class=" gap-2 mx-2">
                <h3 class="text-md font-semibold text-gray-800 mb-2">Author Kesukaaan</h3>
                  <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">JS Khairen</span>
                  <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">JK Rowling</span>
                  <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">Franz Kafka</span>
                  <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">+3 more</span>
                </div>

          </div>


        <!-- Skills and Languages -->

      </div>


    <div class="flex justify-center mb-5 ">


        {{-- <div class=" border basis-2/6 p-3 relative bg-yellow-500 rounded-full">

            <div class="flex justify-center mt-4 relative">
                <img src="{{ $user->profile_photo ? asset('storage/profile_photos/' . $user->profile_photo) : asset('img/avatar1.jpg') }}" class="rounded-full" width="150px" alt="Profile Photo">

                <!-- Tombol untuk membuka modal -->

            </div>

            <p class="text-center mt-2">{{ $user->name }}</p>
            <p class="italic text-center">{{ $user->bio }}</p>

            <div class="flex justify-around mx-20 mt-2 gap-2">
                <a href="/follower" class="bg-blue-700 px-2">follower <span></span></a>
                <a href="/following" class="bg-yellow-500 px-2">following <span></span></a>

                @if (auth()->user()->following->contains($user->id))
                    <form action="{{ route('unfollow', $user) }}" method="POST">
                        @csrf
                        <button type="submit">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow', $user) }}" method="POST">
                        @csrf
                        <button type="submit">Follow</button>
                    </form>
                @endif
            </div>
        </div> --}}

        <div class="p-4 border w-full my-2 rounded-lg">
            <div class="flex justify-between">
                <p class="text-center w-full text-xl  font-mono">Favorit books</p>
                <button onclick="openModal()" class="bg-blue-500 p-1 text-white rounded-md">
                    Add Your Favorite Books
                </button> </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($favoriteBooks as $book)
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <!-- Book Image -->
                            <img src="{{ asset('storage/' . $book->favorite_book_image) }}" alt="{{ $book->favorite_book_title }}" class="w-full h-48 object-cover rounded-md mb-4">

                            <!-- Book Title -->
                            <h2 class="text-lg font-bold mb-2">{{ $book->favorite_book_title }}</h2>

                            <!-- Book Rate -->
                            <p class="text-gray-700 mb-2">Rating: {{ $book->favorite_book_rate }} / 5</p>

                            <!-- Book Description -->
                            {{-- <p class="text-gray-600">{{ $book->favorite_book_description }}</p> --}}
                        </div>
                    @endforeach
                </div>
<!-- Trigger Button -->


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

<script>
    function openModal() {
        document.getElementById('favoriteBookModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('favoriteBookModal').classList.add('hidden');
    }
</script>

        </div>

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
    <div class="flex justify-center gap-2">

        <div class="rounded-md border basis-4/6 p-3">
            <h2 class="text-center font-semibold text-lg my-3">Rangkuman yang di post</h2>
            <div class="grid grid-cols-2 gap-2">
                @if($posts->isEmpty())
                <p>You have no posts.</p>
            @else
                @foreach($posts as $post)
                    <div class="bg-white shadow-md rounded p-4 mb-4">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p>{!! $post->body !!}</p>
                        <small class="text-gray-500">Posted on {{ $post->created_at->format('d M Y') }}</small>
                    </div>
                @endforeach
            @endif

            </div>
        </div>

        <div class="rounded-md border basis-3/6 p-3">
            <h1 class="text-center font-semibold text-lg">Audiobook yang dipost</h1>

            <div class="space-y-4">
                @if($audiobooks)
                    @foreach($audiobooks as $audiobook)
                        <div class="p-4 border rounded">
                            <h2 class="text-xl font-bold">{{ $audiobook->title }}</h2>
                            <p class="text-gray-600">Oleh: {{ $audiobook->speaker->name ?? 'Unknown' }}</p>

                            <p>{{ $audiobook->description }}</p>

                        </div>
                    @endforeach
                @else
                    <p>No audiobooks found.</p>
                @endif
            </div>
        </div>

    </div></div>
</x-layout>
