<x-layout>
    <article class="pb-8 lg:py-8 border-b border-gray-300 grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-1 flex justify-center">
            <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}" alt="Book Cover" class="h-60 w-full object-cover rounded-md shadow-md">
        </div>
        <div class="lg:col-span-3">
            <span class="inline-flex items-center rounded-md bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 ring-1 ring-green-600/20">
                {{ $post['type'] }}
            </span>
            <h1 class="mt-3 text-2xl font-bold text-gray-800">{{ $post['title'] }}</h1>
            <p class="text-sm text-gray-600 mt-2">
                By
                <a href="/posts?authors={{ $post->author->username }}" class="text-indigo-600 hover:underline">{{ $post->author->name }}</a>
                in
                <a href="/posts?category={{ $post->category->slug }}" class="text-indigo-600 hover:underline">{{ $post->category->name }}</a>
                | {{ $post->created_at->format('j F Y') }}
            </p>
            <div class="mt-4 text-gray-700 leading-relaxed space-y-4">
                {!! $post['body'] !!}
            </div>
        </div>
    </article>

    <div class="px-4 lg:px-16 mt-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Berikan Komentar</h2>
        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-8">
            @csrf
            <textarea name="content" rows="3" class="w-full border rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 placeholder-gray-400" placeholder="Tambahkan komentar..." required></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400">Post Comment</button>
        </form>

        @foreach ($post->comments as $comment)
            <div class="border-b border-gray-200 pb-4 mb-4">
                <div class="flex justify-between items-center">
                    <span class="font-semibold text-gray-800">{{ $comment->user->name }}</span>
                    <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="text-gray-700 mt-2">{{ $comment->content }}</p>
                @if (auth()->id() === $comment->user_id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                    </form>
                @endif
            </div>
        @endforeach

        <a href="/posts" class="text-sm font-medium text-indigo-600 hover:underline">← Kembali ke daftar posting</a>
    </div>
</x-layout>
