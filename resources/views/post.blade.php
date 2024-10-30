<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <article class="pb-8 lg:py-8 border-b border-gray-300 grid grid-cols-1  lg:flex gap-6">
        <div class="lg:basis-1/4 flex justify-center">
            <img src="{{ asset('storage/' . $post->cover)  }}" alt="" class="h-60">
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

    <a href="/posts" class="font-medium text-blue-600 hover:underline" > &laquo;Back to posts </a>


</x-layout>
