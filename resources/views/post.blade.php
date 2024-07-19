<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    

    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h1 class="mb-3 text-3xl tracking-tight font-bold text-gray-900 ">{{ $post['title'] }}</h1>
        <div class="text-base text-gray-600 mt-2">
            {{-- kalau array echonya tu $post['title'] --}}
            <a href="#">{{ $post['author'] }}</a> | {{ $post->created_at->format( 'j F Y') }}

        </div>
        <p class="my-4 font-light">{{  $post['body']}}</p>
        <a href="/posts" class="font-medium text-blue-600 hover:underline" > &laquo;Back to posts </a>
    </article>  
   
    

   
</x-layout>