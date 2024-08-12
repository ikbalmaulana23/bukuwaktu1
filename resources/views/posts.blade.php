<x-layout>
    
        <div class="bg-white  ">
          <div class="flex  justify-between" >
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Bookshelf</h2>
            <form action=""> 
              @if(request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
              @endif
                <div v class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                       
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                          <i class="fa-solid fa-magnifying-glass"></i>
                       
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari buku yang anda inginkan " type="search" id="search" name="search">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-gray-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-gray-800 focus:ring-4 ">Search</button>
                    </div>
                </div>
          
            </form>
          </div>
         {{-- @dd($quote) --}}
          <div class="container mx-auto pb-4 mb-4">
            <p id="quote" class=" text-md leading-8 text-gray-600 border-gray-200">
                {{ $quote['quote'] ?? 'Quote not found.' }}
            </p>
            <p class="text-gray-400">
                — {{ $quote['author'] ?? 'Unknown author' }}
            </p>
            {{-- <button id="refresh-quote" class="bg-blue-500 text-white px-4 py-2 rounded">Generate New Quote</button> --}}
        </div>
      

        
 <div class="mx-auto max-w-screen-md sm:text-center">
  
  {{-- @dump(request('search'));  --}}
</div>
<a href="/posts" class="text-sm relative rounded-full bg-yellow-300 px-6 py-1.5 font-medium text-gray-600 hover:bg-yellow-400 mx-3">All</a>

@foreach ($category as $item)

<a href="/posts?category={{ $item->slug }}" class="text-sm relative rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $item->name }}</a>

@endforeach

        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8   lg:max-w-none lg:grid-cols-4 mt-10">
           

        
                   

            @forelse ($posts as $post)
            <article class="flex   flex-col items-start justify-between border rounded-md p-5">
                
                {{-- <div class="flex  items-center gap-x-4 text-xs w-full">
                        <a href="/posts?category={{ $post->category->slug }}" class="relative rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>
                  
                  </div> --}}
                  
                  
                <div>
                  
                </div>
               
                
                   
                <div class="w-full mb-2">
                    <img src="{{ asset('img/bukuasli1.png') }}" class="object-cover h-60 object-left-bottom w-full rounded-lg " alt="gambar">
                </div>
               
                <div class="group relative">
                  
                  {{-- <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ Str::limit($post['body'], 150) }}.</p> --}}
                </div>
                <div class=" mt-1 items-center gap-x-4 w-full">
                  <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600 inline">
                    <a href="/posts/{{ $post['id'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline"> {{ Str::limit($post['title'], 20) }}</a>
                </h3>
          
                </div>
                <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 mb-3  mt-1 " > Summarized by
                  <span class="absolute  font-semibold text-gray-900 mx-2"> {{ $post->author->name }}   </span>
               
                </a>  
              </article>
              @empty
              <p class="text-center">Topik yang anda cari tidak ditemukan</p>
              <a href="/posts" class="text-center text-blue-600">&laquo Kembali ke halaman bookshelf</a>
              @endforelse
 
          </div>
      </div>
        <div class="mx-auto max-w-7xl ">

          
      </div>
      


    
   
</x-layout>