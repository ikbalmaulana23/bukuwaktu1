<!doctype html>
<html class="h-full bg-white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
  
</head>
<body class="h-full">
 
<main class="flex w-full h-full ">
  <section class="flex flex-col w-2/12 bg-slate-800 ">
    
    <a href="/" class="w-30 mx-auto mt-12 mb-20 p-4 flex bg-indigo-600 rounded-2xl text-white">
      <i class="fa-solid fa-house" style="color: #ffffff;"></i><p class="ml-4"> Buku Waktu</p> 
    </a>
    <nav class="relative flex flex-col py-4 items-center bg-slate-800">
      <a href="/dashboard" class="w-16 p-4 border text-gray-100 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
        </svg>
       
      </a>
      <a href="/audiobooks/create" class="relative w-16 p-4 bg-purple-100 text-purple-900 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
      </a>
      <a href="#" class="w-16 p-4 border text-gray-100 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </a>
      <a href="#" class="w-16 p-4 border text-gray-100 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
        </svg>
      </a>
      <a href="#" class="w-16 p-4 border text-gray-100 rounded-2xl mb-24">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </a>
      <a href="#" class="w-16 p-4 border text-gray-100 rounded-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </a>
    </nav>
  </section>

  <section class="w-10/12 px-4 flex flex-col bg-white rounded-r-3xl ml-4">
    <div class="flex justify-between items-center h-32  ">
      <div class="flex space-x-4 items-center">
        <div class="h-12 w-12 rounded-full overflow-hidden">
          <img src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
        </div>
        <div class="flex flex-col">
          <h3 class="font-semibold text-lg">   {{ optional(auth()->user())->name ?? "" }}</h3>
          <p class="text-light text-gray-400">   {{ optional(auth()->user())->email ?? "" }}</p>
        </div>
      </div>
      <div>
        <ul class="flex text-gray-400 space-x-4">
          <li class="w-6 h-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
          </li>
          <li class="w-6 h-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </li>

          <li class="w-6 h-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
          </li>
          <li class="w-6 h-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </li>
          <li class="w-6 h-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
            </svg>
          </li>
        </ul>
      </div>
    </div>
    <div class="container mx-auto p-6">
      <h1 class="text-2xl font-bold mb-6">Tambah Audiobook Baru</h1>

      @if ($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('audiobooks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <div>
              <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
              <input type="text" name="title" id="title" value="{{ old('title') }}" 
                     class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                     focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
          </div>

          <div>
              <label for="cover" class="block text-sm font-medium text-gray-700">Cover (Gambar)</label>
              <input type="file" name="cover" id="cover" 
                     class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 
                     rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div>
              <label for="file" class="block text-sm font-medium text-gray-700">File Audio (MP3/WAV)</label>
              <input type="file" name="file" id="file" 
                     class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 
                     rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div>
              <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
              <textarea name="description" id="description" rows="4" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                        focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
          </div>

          <div>
              <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent 
                      shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Simpan
              </button>
          </div>
      </form>
  </div>
    
 
  </section>
</main>

</body>
</html>