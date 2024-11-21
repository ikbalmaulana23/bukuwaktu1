<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div id="progress-bar-container">
        <div id="progress-bar"></div>
    <div id="progress-percent"> <span class="text-gray-100"> 0% </span> </div>
    </div>
    <article class="pb-8 lg:py-8 border-b border-gray-300 grid grid-cols-1  lg:flex gap-6">
        <div class="lg:basis-1/4 flex justify-center">
            <img src="{{ $post->cover ? asset('storage/' . $post->cover)  : asset('img/bukuasli1.png')  }}" alt="" class="h-60">
        </div>
        <div class="lg:basis-3/4">
            <h1 class="mb-3 text-3xl tracking-tight font-bold text-gray-900 ">{{ $post['title'] }}</h1>
            <div class="">
               By
                <a href="/posts?authors={{ $post->author->username }}" class="text-base text-gray-600 mt-2 hover:underline">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-base text-gray-600 mt-2 hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format( 'j F Y') }}

            </div>
            <p class="my-4 font-light">{!!  $post['body']!!}</p>
        </div>

    </article>

    <h1 class="text-lg font-bold *:">Berikan Komentar</h1>
    <form action="{{ route('comments.store', $post->id) }}" method="POST" >
        @csrf
        <textarea class="border w-96 rounded-md" name="content" rows="3" placeholder="Add a comment..." required></textarea>
        <button type="submit">Post Comment</button>
    </form>
    <br>
    @foreach ($post->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong> <small>{{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->content }}</p>
        @if (auth()->id() === $comment->user_id)
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    </div>
@endforeach


    <a href="/posts" class="font-medium text-blue-600 hover:underline" > &laquo;Back to posts </a>


</x-layout>
