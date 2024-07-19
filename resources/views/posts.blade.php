<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
{{-- @dd($posts) --}}
    @foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="posts/{{ $post['id'] }}" class="mb-3 text-3xl tracking-tight font-bold text-gray-900 hover:text-gray-700">{{ $post['title'] }}</a>
        <div class="text-base text-gray-600 mt-2">
         
            <a href="#">{{ $post->author->name }}</a> | {{ $post->created_at->format('j F Y') }}


        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 150) }}</p>
        <a href="posts/{{ $post['id'] }}" class="font-medium text-blue-600 hover:underline" >Read More &raquo;</a>
    </article>  
    @endforeach
    
   
</x-layout>