
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 mt-5">

        <div class="grid grid-cols-1 lg:grid-cols-[250px_minmax(0,1fr)] gap-6 lg:gap-8">

            {{-- SIDEBAR KATEGORI --}}
            <aside>
                <div class="lg:sticky lg:top-6 border rounded-xl bg-white p-5 shadow-sm">

                    <h2 class="font-bold text-lg mb-4">
                        Topik Lounge
                    </h2>

                    <div class="flex flex-wrap lg:flex-col gap-2">

                        {{-- Semua --}}
                        <a href="{{ route('lounge.index') }}"
                           class="flex items-center justify-between px-4 py-3 rounded-lg transition
                           {{ !$selectedCategory
                                ? 'bg-blue-50 text-blue-700 font-semibold'
                                : 'text-gray-600 hover:bg-gray-100' }}">

                            <span>Semua</span>


                        </a>

                        {{-- Daftar kategori --}}
                        @foreach ($categories as $category)

                            <a href="{{ route('lounge.index', ['category' => $category->slug]) }}"
                               class="flex items-center justify-between px-4 py-3 rounded-lg transition
                               {{ $selectedCategory?->id === $category->id
                                    ? 'bg-blue-50 text-blue-700 font-semibold'
                                    : 'text-gray-600 hover:bg-gray-100' }}">

                                <span>{{ $category->name }}</span>

                                <span class="text-xs text-gray-400">
                                    {{ $category->lounge_posts_count }}
                                </span>

                            </a>

                        @endforeach

                    </div>

                    {{-- Reset Filter --}}
                    @if ($selectedCategory)
                        <div class="border-t mt-4 pt-4">

                            <a href="{{ route('lounge.index') }}"
                               class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border text-sm text-gray-600 hover:bg-gray-100 transition">

                                <span>↺</span>
                                Reset Filter

                            </a>

                        </div>
                    @endif

                </div>
            </aside>


            {{-- MAIN CONTENT --}}
            <main class="min-w-0 border rounded-xl bg-white p-5 sm:p-6 shadow-sm">

                <h1 class="text-3xl font-bold mb-6">
                    Lounge
                </h1>

                {{-- Notifikasi --}}
                @if (session('pesan'))
                    <div class="mb-5 p-3 rounded-lg bg-green-50 text-green-700 text-sm">
                        {{ session('pesan') }}
                    </div>
                @endif

                {{-- Filter aktif --}}
                @if ($selectedCategory)
                    <div class="mb-5 flex items-center justify-between gap-3">

                        <p class="text-sm text-gray-500">
                            Menampilkan topik:
                            <span class="font-semibold text-blue-700">
                                {{ $selectedCategory->name }}
                            </span>
                        </p>

                        <a href="{{ route('lounge.index') }}"
                           class="text-sm text-blue-600 hover:underline">
                            Hapus filter
                        </a>

                    </div>
                @endif


                {{-- FORM POSTING --}}
                @auth
                    <form action="{{ route('lounge.store') }}"
                          method="POST"
                          class="mb-8">

                        @csrf

                        <div class="mb-3">

                            <select
                                name="category_id"
                                class="w-full rounded-lg border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                required
                            >
                                <option value="">Pilih topik diskusi</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <textarea
                            name="content"
                            rows="4"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Apa yang ingin kamu obrolkan?"
                            required
                        >{{ old('content') }}</textarea>

                        @error('content')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <button
                            type="submit"
                            class="mt-3 px-5 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition"
                        >
                            Posting
                        </button>

                    </form>

                @else

                    <div class="mb-8 p-4 rounded-lg bg-gray-100">
                        Login untuk ikut ngobrol di Lounge.
                    </div>

                @endauth


                {{-- DAFTAR POSTINGAN --}}
                @forelse ($loungePosts as $loungePost)

                    <article class="border rounded-xl p-5 mb-5">

                        {{-- User --}}
                        <div class="flex items-center gap-3 mb-4">

                            <img
                                src="{{ $loungePost->user->profile_photo
                                    ? asset('storage/' . $loungePost->user->profile_photo)
                                    : asset('img/avatar2.jpg') }}"
                                class="w-10 h-10 rounded-full object-cover"
                                alt="Profile"
                            >

                            <div>
                                <p class="font-semibold">
                                    {{ $loungePost->user->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    {{ $loungePost->created_at->diffForHumans() }}
                                </p>
                            </div>

                        </div>


                        {{-- Kategori --}}
                        @if ($loungePost->category)

                            <div class="mb-3">

                                <a href="{{ route('lounge.index', ['category' => $loungePost->category->slug]) }}"
                                   class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700 hover:bg-blue-100 transition">

                                    {{ $loungePost->category->name }}

                                </a>

                            </div>

                        @endif


                        {{-- Isi posting --}}
                        <p class="whitespace-pre-line">
                            {{ $loungePost->content }}
                        </p>


                        {{-- Jumlah komentar --}}
                        <div class="mt-4 text-sm text-gray-500">
                            💬 {{ $loungePost->comments_count }} komentar
                        </div>


                        {{-- Daftar komentar --}}
                        @if ($loungePost->comments->count())

                            <div class="mt-5 space-y-4 border-t pt-4">

                                @foreach ($loungePost->comments as $comment)

                                    <div class="flex gap-3">

                                        <img
                                            src="{{ $comment->user->profile_photo
                                                ? asset('storage/' . $comment->user->profile_photo)
                                                : asset('img/avatar2.jpg') }}"
                                            class="w-8 h-8 rounded-full object-cover"
                                            alt="Profile"
                                        >

                                        <div>

                                            <p class="font-semibold text-sm">
                                                {{ $comment->user->name }}
                                            </p>

                                            <p class="text-sm text-gray-700">
                                                {{ $comment->content }}
                                            </p>

                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </p>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @endif


                        {{-- Form komentar --}}
                        @auth

                            <form
                                action="{{ route('lounge.comments.store', $loungePost) }}"
                                method="POST"
                                class="mt-4"
                            >
                                @csrf

                                <textarea
                                    name="content"
                                    rows="2"
                                    class="w-full rounded-lg border-gray-300"
                                    placeholder="Tulis komentar..."
                                ></textarea>

                                <button
                                    type="submit"
                                    class="mt-2 px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition"
                                >
                                    Komentar
                                </button>

                            </form>

                        @else

                            <p class="mt-4 text-sm text-gray-500">
                                Login untuk ikut berkomentar.
                            </p>

                        @endauth

                    </article>

                @empty

                    <div class="py-10 text-center text-gray-500">

                        <p class="font-medium">
                            Belum ada obrolan di Lounge.
                        </p>

                        <p class="text-sm mt-1">
                            Jadilah yang pertama memulai diskusi!
                        </p>

                    </div>

                @endforelse


                {{-- Pagination --}}
                <div class="mt-6">
                    {{ $loungePosts->links() }}
                </div>

            </main>

        </div>

    </div>

</x-layout>
