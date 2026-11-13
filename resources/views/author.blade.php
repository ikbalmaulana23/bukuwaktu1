
<x-layout>
    <!-- Profil Pengguna -->
    <div class="py-10 border rounded-lg mx-auto max-w-md lg:max-w-lg text-center bg-slate-100 shadow-md">

        <img
            src="{{ $AuthUser->profile_photo
                ? asset('storage/' . $AuthUser->profile_photo)
                : asset('img/avatar1.jpg') }}"
            alt="{{ $AuthUser->name }}"
            class="rounded-full object-cover mx-auto w-32 h-32 md:w-40 md:h-40 lg:w-48 lg:h-48"
        >

        <div class="flex items-center justify-center gap-2 mt-3 flex-wrap">
            <h2 class="text-lg md:text-xl font-semibold">
                {{ $AuthUser->name }}
            </h2>

            @if ($AuthUser->hasBadge())
                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-bold ring-1
                    {{ match ($AuthUser->level) {
                        5 => 'bg-yellow-100 text-yellow-800 ring-yellow-300',
                        4 => 'bg-purple-100 text-purple-800 ring-purple-300',
                        3 => 'bg-blue-100 text-blue-800 ring-blue-300',
                        default => 'bg-gray-100 text-gray-700 ring-gray-300',
                    } }}">
                    {{ $AuthUser->level_name }}
                </span>
            @endif
        </div>

        <p class="text-gray-600 text-sm md:text-base">
            {{ $AuthUser->bio }}
        </p>

        <p class="text-sm text-gray-500 mt-1">
            Followers: {{ $followerCount }}
        </p>

        @if (Auth::check() && Auth::id() !== $AuthUser->id)
            <form
                action="{{ $isFollowing
                    ? route('unfollow', $AuthUser->id)
                    : route('follow', $AuthUser->id) }}"
                method="POST"
                class="mt-3"
            >
                @csrf

                <button
                    type="submit"
                    class="px-3 py-2 rounded-md text-white text-sm md:text-base
                    {{ $isFollowing ? 'bg-gray-500' : 'bg-blue-500' }}"
                >
                    {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                </button>
            </form>
        @endif
    </div>

    <!-- Audiobooks -->
    <div class="mt-10 px-4 lg:px-8">
        <h3 class="text-lg font-semibold mb-4">Audiobooks</h3>

        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
            @forelse ($audiobooks as $audiobook)
                <div class="border rounded-lg p-3 shadow-sm">
                    <h4 class="text-sm font-semibold">
                        {{ $audiobook->title }}
                    </h4>

                    <p class="text-xs text-gray-500">
                        Duration: {{ $audiobook->duration }} mins
                    </p>

                    <a
                        href="{{ asset('storage/' . $audiobook->file) }}"
                        class="text-blue-500 text-xs hover:underline"
                    >
                        Download
                    </a>
                </div>
            @empty
                <p class="text-gray-500 text-sm">
                    No audiobooks available.
                </p>
            @endforelse
        </div>
    </div>

    <!-- List Postingan -->
    <div class="mt-10 px-4 lg:px-8">
        <h3 class="text-lg font-semibold mb-4">Posts</h3>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article class="border rounded-lg p-4 shadow-sm">

                    <img
                        src="{{ $post->cover
                            ? asset('storage/' . $post->cover)
                            : asset('img/bukuasli1.png') }}"
                        alt="{{ $post->title }}"
                        class="w-full h-40 object-cover rounded-md mb-2"
                    >

                    <h4 class="text-sm font-semibold">
                        <a
                            href="{{ url('/posts/' . $post->slug) }}"
                            class="text-blue-600 hover:underline"
                        >
                            {{ Str::limit($post->title, 20) }}
                        </a>
                    </h4>

                    <p class="text-xs text-gray-500 mt-1">
                        Summarized by
                        <span class="font-semibold">
                            {{ $post->author->name }}
                        </span>
                    </p>

                </article>
            @empty
                <p class="text-gray-500 text-sm">
                    No posts found.
                </p>
            @endforelse
        </div>
    </div>

    <!-- Kembali -->
    <div class="mt-8 text-center">
        <a href="/posts" class="text-sm text-blue-500 hover:underline">
            &laquo; Back to posts
        </a>
    </div>
</x-layout>
