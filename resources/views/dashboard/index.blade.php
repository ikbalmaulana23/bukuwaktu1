<x-dashboard-layout>



      <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-6">

          <h1 class="text-4xl font-semibold mb-2">Dashboard Buku Waktu</h1>
          <h2 class="text-gray-600 ml-0.5 italic">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
        </div>
        <div class="flex flex-wrap items-start justify-end -mb-3">

          <a href="/dashboard/posts" class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Buat Resume Buku Baru
          </a>



        </div>

      </div>
      <div>



<h2>Your Posts</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full gap-2 p-3">
    @foreach($posts as $post)
    <div class="bg-white p-3 mb-2 flex flex-col sm:flex-row justify-between rounded-md shadow-sm">
      <div class="mb-2 sm:mb-0">
        {{ $post->title }}
      </div>
      <!-- Edit and Delete Buttons -->
      <div class="flex space-x-2">
        <a href="{{ route('posts.edit', $post->id) }}"
           class="text-white bg-blue-600 rounded-md px-3 py-1 text-center hover:bg-blue-700">
          Edit
        </a>
        <a href="{{ route('posts.destroy', $post->id) }}"
           class="text-white bg-red-600 rounded-md px-3 py-1 text-center hover:bg-red-700">
          Delete
        </a>
      </div>
    </div>
    @endforeach
  </div>


      </div>
    </x-dashboard-layout>
