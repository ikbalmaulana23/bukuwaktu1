<x-layout>
  
  <div class="p-5 border rounded-md w-1/3"> 
      <!-- Profil Penulis -->
      <div class="text-center flex">

        <div class="flex justify-center items-center ">
          <img src="{{ $AuthUser->profile_photo ? asset('storage/profile_photos/' . $AuthUser->profile_photo) : asset('img/avatar.png') }}" 
             alt="Profile Photo" 
             class="w-48 h-auto rounded-md">
        </div>
        <div class="p-3 text-center">

      
          <h2 class="text-2xl font-semibold">{{ $AuthUser->name }}</h2>
          <p class="text-gray-600">{{ $AuthUser->bio }}</p>
          <p class="mt-2 text-sm text-gray-500">Followers: {{ $followerCount }}</p>

          <!-- Tombol Follow/Unfollow -->
          @if (Auth::check() && Auth::user()->id !== $AuthUser->id)
              <form action="{{ $isFollowing ? route('unfollow', $AuthUser->id) : route('follow', $AuthUser->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-md">
                      {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                  </button>
              </form>
          @endif
        </div>
      </div>
  </div>

  <!-- List Postingan -->
  <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-4 mt-10">
      @forelse ($posts as $post)
          <article class="flex flex-col items-start justify-between border rounded-md p-5">
              <div class="w-full mb-2">
                  <img src="{{ asset('img/bukuasli1.png') }}" class="object-cover h-60 object-left-bottom w-full rounded-lg" alt="gambar">
              </div>
              <div class="group relative">
                  <!-- Deskripsi Post -->
              </div>
              <div class="mt-1 items-center gap-x-4 w-full">
                  <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600 inline">
                      <a href="/posts/{{ $post['id'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">
                          {{ Str::limit($post['title'], 20) }}
                      </a>
                  </h3>
              </div>
              <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 mb-3 mt-1">
                  Summarized by <span class="absolute font-semibold text-gray-900 mx-2">{{ $post->author->name }}</span>
              </a>
          </article>
      @empty
          <p class="text-center">Topik yang anda cari tidak ditemukan</p>
          <a href="/posts" class="text-center text-blue-600">&laquo Kembali ke halaman bookshelf</a>
      @endforelse
  </div>
 
  <a href="/posts" class="font-medium text-blue-600 hover:underline">&laquo; Back to posts</a>
 
</x-layout>
