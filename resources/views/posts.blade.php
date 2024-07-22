<x-layout>
    <x-slot:title >  <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Bookshelf</h2>
    <p class="mt-2 text-md leading-8 text-gray-600  border-b border-gray-200 ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore ullam fuga   deleniti vitae, explicabo recusandae.</p>

        </x-slot:title>
        <div class="bg-white  ">
         

        
 <div class="mx-auto max-w-screen-md sm:text-center">
  <form action=""> 
    @if(request('category'))
    <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
      <div v class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
          <div class="relative w-full">
              <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass"></i>
             
              </div>
              <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari buku yang anda inginkan" type="search" id="search" name="search">
          </div>
          <div>
              <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-gray-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-gray-800 focus:ring-4 ">Search</button>
          </div>
      </div>

  </form>
  {{-- @dump(request('search'));  --}}
</div>
         

        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8   lg:max-w-none lg:grid-cols-2 mt-10">
          
           
            @forelse ($posts as $post)
            <article class="flex   flex-col items-start justify-between border rounded-md p-5">
                
                <div class="flex  items-center gap-x-4 text-xs w-full">
                    
                        <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format( 'j F Y') }}</time>
                        <a href="/posts?category={{ $post->category->slug }}" class="relative rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>
                  
                  </div>
                  
                  <h3 class="my-2 text-3xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="/posts/{{ $post['id'] }}" class="mb-3 text-3xl tracking-tight font-bold text-gray-900 hover:text-gray-700">{{ $post['title'] }}</a>
                </h3>
                <div>
                  
                </div>
                <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 mb-3  mt-1 " > Writen by 
                    <span class="absolute  font-semibold text-gray-900 mx-2"> {{ $post->author->name }}   </span>
                 
                  </a>  
                
                   
                <div class="w-full mb-2">
                    <img src="img/image.jpg" class="object-none h-48 object-left-bottom w-full rounded-lg " alt="gambar">
                </div>
               
                <div class="group relative">
                  
                  <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ Str::limit($post['body'], 150) }}.</p>
                </div>
                <div class=" mt-8 items-center gap-x-4 w-full">
                  
                  <div class="flex justify-end">
                    <a href="posts/{{ $post['id'] }}" class="mr-5 hover:translate-x-5 duration-300 ease-in-out">Baca lebih lanjut &raquo</a>
                  </div>
                    
                
                </div>
              </article>
              @empty
              <p class="text-center">Topik yang anda cari tidak ditemukan</p>
              <a href="/posts" class="text-center text-blue-600">&laquo Kembali ke halaman bookshelf</a>
              @endforelse
 
          </div>
      </div>
        <div class="mx-auto max-w-7xl ">

          
      </div>
      


      {{-- @dd($posts) --}}
    {{-- @foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{ $post['id'] }}" class="mb-3 text-3xl tracking-tight font-bold text-gray-900 hover:text-gray-700">{{ $post['title'] }}</a>
        <div class="text-base ">
         
            By
            <a href="/authors/{{ $post->author->username }}" class="text-base text-gray-600 mt-2 hover:underline">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-base text-gray-600 mt-2 hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format( 'j F Y') }}


        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 150) }}</p>
        <a href="posts/{{ $post['id'] }}" class="font-medium text-blue-600 hover:underline" >Read More &raquo;</a>
    </article>  
    @endforeach --}}
    
   
</x-layout>