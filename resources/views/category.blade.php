<x-layout>
  
    <div class="p-5 border rounded-md w-96"> 

      <div class="flex gap-3">
        <img src="{{ asset('img/profile.jpeg') }}" alt="" class="h-20 rounded-full">
        <div>

        </div>
        <div class="flex flex-col pt-1 pb-2">
          <h1 class="text-center font-semibold text-lg mb-2 ">{{ $user->name }}</h1>
          <div class="flex gap-3">
            

            <form action="{{ route('follow1', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary">
                  Follow
              </button>
          </form>
        
          </div>
          <div>
          
          </div>
          
        </div>
       

      </div>
    
    </div>
      

   
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
   
    <a href="/posts" class="font-medium text-blue-600 hover:underline" > &laquo;Back to posts </a>

   
</x-layout>