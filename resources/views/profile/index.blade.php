
<x-layout>

<style>
    [x-cloak] {
        display: none !important;
    }

    .profile-cover {
        background-position: center;
        background-size: cover;
    }

    .book-card {
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .book-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,.07);
    }
</style>

<div class="max-w-6xl mx-auto px-3 sm:px-5 lg:px-8 space-y-6">

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="rounded-xl bg-green-50 border border-green-200 p-4 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERRORS --}}
    @if ($errors->any())
        <div class="rounded-xl bg-red-50 border border-red-200 p-4 text-red-600 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- ===================================== --}}
    {{-- PROFILE HEADER --}}
    {{-- ===================================== --}}

    <section class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm mt-5">

        {{-- Banner --}}
        <div class="relative h-32 sm:h-44 lg:h-56 ">

            <img src="{{ asset('img/banner.jpg') }}"
                 alt="Profile Banner"
                 class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

            {{-- Edit Profile Button --}}
            <button type="button"
                    id="openModal"
                    class="absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full
                           shadow-md flex items-center justify-center
                           text-gray-700 hover:text-yellow-600 transition">

                <i class="fas fa-pen"></i>

            </button>

        </div>


        {{-- Profile Information --}}
        <div class="px-4 sm:px-6 pb-5">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">

                {{-- Avatar and User --}}
                <div class="flex flex-col sm:flex-row sm:items-end gap-4">

                    {{-- Avatar --}}
                    <div class="-mt-12 sm:-mt-14 relative shrink-0">

                        <img
                            src="{{ Auth::user()->profile_photo
                                ? asset('storage/' . Auth::user()->profile_photo)
                                : asset('img/avatar2.jpg') }}"
                            alt="Profile Picture"
                            class="w-24 h-24 sm:w-32 sm:h-32 rounded-full
                                   object-cover border-4 border-white
                                   shadow-md ring-2 ring-yellow-400">

                    </div>

                    {{-- User Details --}}
                    <div class="sm:pb-1">

                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                            {{ $user->name }}
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-map-marker-alt text-yellow-500 mr-1"></i>
                            Indonesia
                        </p>

                        @if($user->bio)
                            <p class="text-sm text-gray-500 mt-2 max-w-xl leading-relaxed">
                                {{ $user->bio }}
                            </p>
                        @endif

                        <div class="flex flex-wrap items-center gap-3 mt-4">

    {{-- Followers --}}
    <button type="button"
            onclick="document.getElementById('followersModal').classList.remove('hidden')"
            class="px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 transition text-blue-700 text-sm">

        <strong>{{ $followers->count() }}</strong>
        Followers

    </button>

    {{-- Following --}}
    <button type="button"
            onclick="document.getElementById('followingModal').classList.remove('hidden')"
            class="px-4 py-2 rounded-xl bg-yellow-50 hover:bg-yellow-100 transition text-yellow-700 text-sm">

        <strong>{{ $following->count() }}</strong>
        Following

    </button>

</div>


{{-- Followers Modal --}}
<div id="followersModal"
     class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl w-full max-w-md p-5">

        <div class="flex justify-between mb-4">
            <h3 class="font-bold text-lg">Followers</h3>

            <button onclick="this.closest('#followersModal').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        @forelse($followers as $follower)
            <div class="flex items-center gap-3 py-3 border-b">

                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-user text-gray-400"></i>
                </div>

                <span class="text-sm font-medium">
                    {{ $follower->name }}
                </span>

            </div>
        @empty
            <p class="text-sm text-gray-400 py-5 text-center">
                Belum ada followers.
            </p>
        @endforelse

    </div>
</div>


{{-- Following Modal --}}
<div id="followingModal"
     class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl w-full max-w-md p-5">

        <div class="flex justify-between mb-4">
            <h3 class="font-bold text-lg">Following</h3>

            <button onclick="this.closest('#followingModal').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        @forelse($following as $followedUser)
            <div class="flex items-center gap-3 py-3 border-b">

                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-user text-gray-400"></i>
                </div>

                <span class="text-sm font-medium">
                    {{ $followedUser->name }}
                </span>

            </div>
        @empty
            <p class="text-sm text-gray-400 py-5 text-center">
                Belum mengikuti siapa pun.
            </p>
        @endforelse

    </div>
</div>

                    </div>

                </div>


                {{-- User Badge --}}
                @php
                    $badges = [
                        1 => 'Rookie.jpg',
                        2 => 'Explorer.jpg',
                        3 => 'Scholar.jpg',
                        4 => 'Sage.jpg',
                        5 => 'Grandmaster.jpg',
                    ];
                @endphp

                @if ($user->hasBadge() && isset($badges[$user->level]))
                    <div class="flex items-center justify-start sm:justify-end">

                        <img
                            src="{{ asset('img/badges/' . $badges[$user->level]) }}"
                            alt="{{ $user->level_name }}"
                            title="{{ $user->level_name }}"
                            class="w-20 h-20 sm:w-24 sm:h-24 object-contain">

                    </div>
                @endif

            </div>

        </div>

    </section>



    {{-- ===================================== --}}
    {{-- BOOKS & AUDIOBOOKS --}}
    {{-- ===================================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-6 items-start">


        {{-- ================================= --}}
        {{-- LEFT COLUMN : BOOK POSTS --}}
        {{-- ================================= --}}

        <section class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden"
                 x-data="{ showAll: false }">

            {{-- Section Header --}}
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

                <div>
                    <h2 class="font-bold text-gray-900 text-base sm:text-lg">
                        <i class="fas fa-book-open text-yellow-500 mr-2"></i>
                        Rangkuman Buku
                    </h2>

                    <p class="text-xs text-gray-400 mt-1">
                        Buku dan pemikiran yang kamu bagikan.
                    </p>
                </div>

                <span class="text-xs bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                    {{ $posts->count() }} Post
                </span>

            </div>


            {{-- Book Posts --}}
            <div class="p-4 sm:p-5">

                @if($posts->isEmpty())

                    <div class="py-12 text-center">
                        <i class="fas fa-book text-4xl text-gray-200"></i>

                        <p class="text-sm text-gray-400 mt-3">
                            Belum ada rangkuman buku.
                        </p>
                    </div>

                @else

                    <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">

                        @foreach($posts as $key => $post)

                            <article
                                class="book-card bg-gray-50 border border-gray-100
                                       rounded-xl overflow-hidden p-2.5 sm:p-3"
                                x-show="showAll || {{ $key }} < 3"
                                x-cloak>

                                {{-- Cover --}}
                                <div class="aspect-[3/4] w-full overflow-hidden rounded-lg bg-gray-100">

                                    <img
                                        src="{{ $post->cover
                                            ? asset('storage/' . $post->cover)
                                            : asset('img/bukuasli1.png') }}"
                                        alt="{{ $post->title }}"
                                        loading="lazy"
                                        class="w-full h-full object-cover">

                                </div>

                                {{-- Details --}}
                                <div class="pt-3">

                                    <h3 class="text-sm font-bold text-gray-900 leading-snug line-clamp-3">

                                        {{ $post->title }}

                                    </h3>

                                    <p class="text-xs text-gray-500 mt-2 leading-relaxed line-clamp-3">

                                        {{ Str::limit(strip_tags($post->body), 100) }}

                                    </p>

                                    <p class="text-[10px] text-gray-400 mt-3">

                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $post->created_at->format('d M Y') }}

                                    </p>

                                </div>

                            </article>

                        @endforeach

                    </div>


                    {{-- Show All --}}
                    @if($posts->count() > 3)

                        <div class="mt-5 text-center">

                            <button
                                @click="showAll = !showAll"
                                class="inline-flex items-center gap-2 px-5 py-2.5
                                       bg-yellow-400 hover:bg-yellow-500
                                       text-gray-900 text-xs font-bold
                                       rounded-lg transition">

                                <span x-text="showAll ? 'Show Less' : 'Show All'"></span>

                                <i class="fas fa-chevron-down text-[10px]"
                                   :class="showAll ? 'rotate-180' : ''"></i>

                            </button>

                        </div>

                    @endif

                @endif

            </div>

        </section>



        {{-- ================================= --}}
        {{-- RIGHT COLUMN : AUDIOBOOKS --}}
        {{-- ================================= --}}

        <section class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden"
                 x-data="{ showAll: false }">

            {{-- Section Header --}}
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

                <div>

                    <h2 class="font-bold text-gray-900 text-base sm:text-lg">
                        <i class="fas fa-headphones text-yellow-500 mr-2"></i>
                        Audiobook
                    </h2>

                    <p class="text-xs text-gray-400 mt-1">
                        Koleksi audiobook yang kamu bagikan.
                    </p>

                </div>

                <span class="text-xs bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                    {{ $audiobooks ? $audiobooks->count() : 0 }} Audio
                </span>

            </div>


            {{-- Audiobook List --}}
            <div class="p-4 sm:p-5">

                @if($audiobooks && $audiobooks->isNotEmpty())

                    <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-4">

                        @foreach($audiobooks as $key => $audiobook)

                            <article
                                class="book-card bg-gray-50 border border-gray-100
                                       rounded-xl overflow-hidden p-2.5 sm:p-3"
                                x-show="showAll || {{ $key }} < 2"
                                x-cloak>

                                {{-- Cover --}}
                                <div class="aspect-[3/4] w-full overflow-hidden rounded-lg bg-gray-100">

                                    <img
                                        src="{{ $audiobook->cover
                                            ? asset('storage/' . $audiobook->cover)
                                            : asset('img/bukuasli1.png') }}"
                                        alt="{{ $audiobook->title }}"
                                        loading="lazy"
                                        class="w-full h-full object-cover">

                                </div>

                                {{-- Details --}}
                                <div class="pt-3">

                                    <h3 class="text-sm font-bold text-gray-900 leading-snug line-clamp-3">

                                        {{ $audiobook->title }}

                                    </h3>

                                    <div class="mt-3 flex items-center gap-1.5 text-xs text-gray-400">

                                        <i class="fas fa-headphones text-yellow-500"></i>

                                        <span>Audiobook</span>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>


                    {{-- Show More --}}
                    @if($audiobooks->count() > 2)

                        <div class="mt-5 text-center">

                            <button
                                @click="showAll = !showAll"
                                class="inline-flex items-center gap-2 px-5 py-2.5
                                       bg-yellow-400 hover:bg-yellow-500
                                       text-gray-900 text-xs font-bold
                                       rounded-lg transition">

                                <span x-text="showAll ? 'Show Less' : 'Show More'"></span>

                                <i class="fas fa-chevron-down text-[10px]"
                                   :class="showAll ? 'rotate-180' : ''"></i>

                            </button>

                        </div>

                    @endif

                @else

                    <div class="py-12 text-center">

                        <i class="fas fa-headphones text-4xl text-gray-200"></i>

                        <p class="text-sm text-gray-400 mt-3">
                            Belum ada audiobook yang dipost.
                        </p>

                    </div>

                @endif

            </div>

        </section>

    </div>

</div>



{{-- ===================================== --}}
{{-- FAVORITE BOOK MODAL --}}
{{-- ===================================== --}}

<div id="favoriteBookModal"
     class="hidden fixed inset-0 bg-black/50 z-50
            flex items-center justify-center p-4">

    <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-md
                max-h-[90vh] overflow-y-auto">

        <h2 class="text-lg font-bold mb-5">
            Add Favorite Book
        </h2>

        <form method="POST"
              action="{{ route('favorite_books.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label for="favorite_book_image"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Book Image
                </label>

                <input type="file"
                       name="favorite_book_image"
                       id="favorite_book_image"
                       class="block w-full text-sm">

            </div>


            <div class="mb-4">

                <label for="favorite_book_title"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Book Title
                </label>

                <input type="text"
                       name="favorite_book_title"
                       id="favorite_book_title"
                       class="w-full border-gray-300 rounded-lg text-sm"
                       required>

            </div>


            <div class="mb-4">

                <label for="favorite_book_rate"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Book Rate
                </label>

                <input type="number"
                       name="favorite_book_rate"
                       id="favorite_book_rate"
                       min="0"
                       max="5"
                       class="w-full border-gray-300 rounded-lg text-sm"
                       required>

            </div>


            <div class="mb-5">

                <label for="favorite_book_description"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Book Description
                </label>

                <textarea name="favorite_book_description"
                          id="favorite_book_description"
                          rows="3"
                          class="w-full border-gray-300 rounded-lg text-sm"></textarea>

            </div>


            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 bg-gray-100 rounded-lg text-sm">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500
                               rounded-lg text-sm font-semibold">
                    Save
                </button>

            </div>

        </form>

    </div>

</div>



{{-- ===================================== --}}
{{-- EDIT PROFILE MODAL --}}
{{-- ===================================== --}}

<div id="profileModal"
     class="hidden fixed inset-0 bg-black/50 z-50
            flex items-center justify-center p-4">

    <div class="bg-white p-6 rounded-2xl shadow-xl
                w-full max-w-md max-h-[90vh] overflow-y-auto">

        <div class="flex justify-between items-center mb-5">

            <h2 class="font-bold text-lg">
                Edit Profile
            </h2>

            <button type="button"
                    id="closeModal"
                    class="text-gray-400 hover:text-gray-800">

                <i class="fas fa-times text-lg"></i>

            </button>

        </div>


        <form action="{{ route('profile.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PATCH')


            <div class="mb-4">

                <label for="profile_photo"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Foto Profil
                </label>

                <input type="file"
                       name="profile_photo"
                       id="profile_photo"
                       accept="image/*"
                       class="block w-full text-sm">

            </div>


            <div class="mb-4">

                <label for="name"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Nama
                </label>

                <input type="text"
                       name="name"
                       id="name"
                       value="{{ $user->name }}"
                       class="w-full border-gray-300 rounded-lg text-sm">

            </div>


            <div class="mb-5">

                <label for="bio"
                       class="block text-sm font-medium text-gray-700 mb-2">
                    Bio
                </label>

                <textarea name="bio"
                          id="bio"
                          rows="3"
                          class="w-full border-gray-300 rounded-lg text-sm">{{ $user->bio }}</textarea>

            </div>


            <div class="flex justify-end gap-2">

                <button type="button"
                        id="closeModalButton"
                        class="px-4 py-2 rounded-lg bg-gray-100 text-sm">
                    Batal
                </button>

                <button type="submit"
                        class="px-5 py-2 rounded-lg bg-yellow-400
                               hover:bg-yellow-500 text-sm font-semibold">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



{{-- ===================================== --}}
{{-- JAVASCRIPT --}}
{{-- ===================================== --}}

<script>

    // Favorite Book Modal
    function openModal() {
        document.getElementById('favoriteBookModal')
            .classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('favoriteBookModal')
            .classList.add('hidden');
    }


    document.addEventListener('DOMContentLoaded', function () {

        // Edit Profile Modal
        const profileModal = document.getElementById('profileModal');

        const openProfile = document.getElementById('openModal');

        const closeProfile = document.getElementById('closeModal');

        const closeProfileButton = document.getElementById('closeModalButton');


        if (openProfile) {
            openProfile.addEventListener('click', function () {
                profileModal.classList.remove('hidden');
            });
        }


        function hideProfileModal() {
            profileModal.classList.add('hidden');
        }


        if (closeProfile) {
            closeProfile.addEventListener('click', hideProfileModal);
        }

        if (closeProfileButton) {
            closeProfileButton.addEventListener('click', hideProfileModal);
        }


        // Close modal when clicking outside
        profileModal.addEventListener('click', function (event) {
            if (event.target === profileModal) {
                hideProfileModal();
            }
        });


        // Escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                hideProfileModal();
                closeModal();
            }
        });


        // Favorite modal outside click
        const favoriteModal = document.getElementById('favoriteBookModal');

        favoriteModal.addEventListener('click', function (event) {
            if (event.target === favoriteModal) {
                closeModal();
            }
        });


        // Swiper - only initialize if available
        if (typeof Swiper !== 'undefined' &&
            document.querySelector('.mySwiper')) {

            new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 10,

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },

                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },

                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 25,
                    },
                },
            });

        }

    });

</script>

</x-layout>

