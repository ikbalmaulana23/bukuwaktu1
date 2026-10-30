
<x-layout>
    <div class="min-h-screen bg-white">
        <div class="max-w-7xl mx-auto px-5 py-10">

            {{-- Heading --}}
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-semibold">
                    Explore BukuWaktu
                </h1>

                <p class="text-gray-500 mt-2">
                    Temukan buku, audiobook, dan pembaca favoritmu.
                </p>
            </div>

            {{-- Search Form --}}
            <form action="{{ url('search') }}" method="GET" class="max-w-3xl">
                <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden shadow-sm focus-within:border-gray-400">

                    <input
                        type="search"
                        name="q"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari buku, audiobook, atau pengguna..."
                        class="w-full border-0 focus:ring-0 px-5 py-4 text-sm"
                    >

                    <button
                        type="submit"
                        class="bg-gray-900 text-white px-7 py-4 text-sm hover:bg-black transition"
                    >
                        Search
                    </button>
                </div>
            </form>

            {{-- Search Results --}}
            <div class="mt-12">

                @if(!empty($search))

                    <p class="text-sm text-gray-500 mb-8">
                        Hasil pencarian untuk:
                        <span class="font-semibold text-gray-900">
                            "{{ $search }}"
                        </span>
                    </p>

                    {{-- Books --}}
                    <section class="mb-12">
                        <h2 class="text-xl font-semibold mb-5">
                            Buku
                            <span class="text-sm text-gray-400">
                                ({{ $posts->total() }})
                            </span>
                        </h2>

                        @if($posts->count())
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">

                                @foreach($posts as $post)
                                    <a
                                        href="{{ url('posts.show', $post->slug) }}"
                                        class="group"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $post->cover) }}"
                                            alt="{{ $post->title }}"
                                            class="w-full aspect-[3/4] object-cover rounded-lg group-hover:opacity-90"
                                        >

                                        <h3 class="font-medium text-sm mt-3 line-clamp-2">
                                            {{ $post->title }}
                                        </h3>

                                       <p class="text-xs text-gray-500 mt-1">
    {{ $post->author->name ?? 'Unknown Author' }}
</p>
                                    </a>
                                @endforeach

                            </div>

                            <div class="mt-6">
                                {{ $posts->links() }}
                            </div>
                        @else
                            <p class="text-sm text-gray-400">
                                Tidak ada buku ditemukan.
                            </p>
                        @endif
                    </section>

                    {{-- Audiobooks --}}
                    <section class="mb-12">
                        <h2 class="text-xl font-semibold mb-5">
                            Audiobook
                            <span class="text-sm text-gray-400">
                                ({{ $audiobooks->total() }})
                            </span>
                        </h2>

                        @if($audiobooks->count())
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">

                                @foreach($audiobooks as $audiobook)
                                    <a
                                        href="{{ url('audiobook.show', $audiobook->id) }}"
                                        class="group"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $audiobook->cover) }}"
                                            alt="{{ $audiobook->title }}"
                                            class="w-full aspect-square object-cover rounded-lg group-hover:opacity-90"
                                        >

                                        <h3 class="font-medium text-sm mt-3 line-clamp-2">
                                            {{ $audiobook->title }}
                                        </h3>

                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $audiobook->speaker->name ?? 'Unknown' }}
                                        </p>
                                    </a>
                                @endforeach

                            </div>

                            <div class="mt-6">
                                {{ $audiobooks->links() }}
                            </div>
                        @else
                            <p class="text-sm text-gray-400">
                                Tidak ada audiobook ditemukan.
                            </p>
                        @endif
                    </section>

                    {{-- Users --}}
                    <section class="mb-12">
                        <h2 class="text-xl font-semibold mb-5">
                            Pengguna
                            <span class="text-sm text-gray-400">
                                ({{ $users->total() }})
                            </span>
                        </h2>

                        @if($users->count())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                                @foreach($users as $user)

                               <a href="/authors/{{ $user->username }}"
   class="flex items-center gap-4 p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition">
                                        <img
                                            src="{{ $user->profile_photo
                                                ? asset('storage/' . $user->profile_photo)
                                                : asset('img/avatar2.jpg') }}"
                                            alt="{{ $user->name }}"
                                            class="w-12 h-12 rounded-full object-cover"
                                        >

                                        <div>
                                            <h3 class="font-medium text-sm">
                                                {{ $user->name }}
                                            </h3>

                                            <p class="text-xs text-gray-500">
                                                @{{ $user->username }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach

                            </div>

                            <div class="mt-6">
                                {{ $users->links() }}
                            </div>
                        @else
                            <p class="text-sm text-gray-400">
                                Tidak ada pengguna ditemukan.
                            </p>
                        @endif
                    </section>

                @else

                    <div class="text-center py-20">
                        <h2 class="text-xl font-medium">
                            Mulai pencarianmu
                        </h2>

                        <p class="text-sm text-gray-500 mt-2">
                            Cari buku, audiobook, atau temukan pembaca lainnya.
                        </p>
                    </div>

                @endif

            </div>
        </div>
    </div>
</x-layout>
