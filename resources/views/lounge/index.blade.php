
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-3xl mx-auto py-10 px-4 border rounded-xl bg-white shadow-sm">

        <h1 class="text-3xl font-bold mb-6">
            Lounge
        </h1>

        {{-- Form posting --}}
        @auth
            <form action="{{ route('lounge.store') }}" method="POST" class="mb-8">
                @csrf

                <textarea
                    name="content"
                    rows="4"
                    class="w-full rounded-lg border-gray-300"
                    placeholder="Apa yang ingin kamu obrolkan?"
                ></textarea>

                @error('content')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

                <button
                    type="submit"
                    class="mt-3 px-5 py-2 bg-black text-white rounded-lg"
                >
                    Posting
                </button>
            </form>
        @else
            <div class="mb-8 p-4 rounded-lg bg-gray-100">
                Login untuk ikut ngobrol di Lounge.
            </div>
        @endauth


        {{-- Daftar postingan --}}
        @forelse ($loungePosts as $loungePost)

            <article class="border rounded-xl p-5 mb-5">

                {{-- User posting --}}
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
                                        ? asset('storage/profile_photos/' . $comment->user->profile_photo)
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

                        @error('content')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <button
                            type="submit"
                            class="mt-2 px-4 py-2 bg-black text-white rounded-lg"
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

            <div>
                Belum ada obrolan di Lounge.
            </div>

        @endforelse


        {{-- Pagination --}}
        <div class="mt-6">
            {{ $loungePosts->links() }}
        </div>

    </div>
</x-layout>

