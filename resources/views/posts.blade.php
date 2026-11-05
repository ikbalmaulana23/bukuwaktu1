
<x-layout>



    <div class="bg-white w-full text-center">
        <div class="flex justify-center items-center max-w-2xl mx-auto px-4 py-6 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Koleksi Buku</h2>
            <form action="">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                {{-- <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500" placeholder="Cari buku yang anda inginkan" type="search" id="search" name="search">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-gray-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-gray-800 focus:ring-4">Search</button>
                    </div>
                </div> --}}
            </form>
        </div>




        {{-- <div class="flex justify-center gap-3 mb-5">
            @if(request('search'))
            <div class="flex justify-center ">
                <p class="px-3 py-1 rounded-md border border-blue-500 bg-blue-50 text-blue-700 ">Hasil Pencarian: <strong>{{ request('search') }}</strong></p>
            </div>
            @endif

            @if(request('category'))
            <div class="flex justify-center ">
                <p class="px-3 py-1 rounded-md border border-red-500 bg-red-50 text-red-700 ">Kategori: <strong>{{ request('category') }}</strong></p>
            </div>
            @endif
        </div> --}}

        {{ $posts->links() }}


{{-- <div class="sm:text-center flex flex-wrap justify-center gap-2 mt-5">

    <a href="/posts"
        class="text-sm relative rounded-full px-6 py-1.5 font-medium transition-colors
        {{ !request('category') ? 'bg-yellow-300 text-gray-800' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        All
    </a>

    {{-- Tombol kategori --}}
    {{-- @foreach ($categories as $category)
        <a href="/posts?category={{ $category->slug }}"
            class="text-sm relative rounded-full px-3 py-1.5 font-medium transition-colors
            {{ request('category') === $category->slug
                ? 'bg-yellow-300 text-gray-800'
                : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            {{ $category->name }}
        </a>
    @endforeach
{{-- </div> --}}


        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-4 mt-10">
            @forelse ($posts as $post)
            <div class="relative">
               <span class="absolute top-0 right-0 inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold
    bg-gray-900 text-white rounded-bl-lg rounded-tr-md shadow-sm">
    <i class="fa-solid fa-fire text-yellow-400"></i>
    The Most Read
</span>

              <article class="flex flex-col items-start justify-between border rounded-md p-5">
    <div class="w-full mb-2 h-64 overflow-hidden">
        <a href="/posts/{{ $post['slug'] }}" class="block w-full h-full">
            <img
                src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}"
                class="h-full w-full object-cover rounded-lg"
                alt="gambar"
            >
        </a>
    </div>

    <div class="group relative"></div>

    <div class="mt-1 items-center gap-x-4 w-full">
        <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600 inline">
            <a href="/posts/{{ $post['slug'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">{{ Str::limit($post['title'], 20) }}</a>
        </h3>
    </div>

    <div class="text-xs text-gray-600 mb-3 mt-1 flex items-center flex-wrap gap-1">
        <span>Summarized by</span>

        <a href="/authors/{{ $post->author->username }}" class="inline-flex items-center gap-1 font-semibold text-gray-900 hover:text-gray-600">
            {{ Str::limit($post->author->name, 20) }}

          @if ($post->author->level >= 3)
    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-bold ring-1
        {{ match ($post->author->level) {
            5 => 'bg-yellow-100 text-yellow-800 ring-yellow-300',
            4 => 'bg-purple-100 text-purple-800 ring-purple-300',
            3 => 'bg-blue-100 text-blue-800 ring-blue-300',
            default => 'bg-gray-100 text-gray-700 ring-gray-300',
        } }}">
        {{ $post->author->level_name }}
    </span>
@endif
        </a>
    </div>
</article>
            </div>

            @empty
                <p class="text-center">Topik yang anda cari tidak ditemukan</p>
                <a href="/posts" class="text-center text-blue-600">&laquo Kembali ke halaman bookshelf</a>
            @endforelse
        </div>
    </div>

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('pesan'))
    <script>
        Swal.fire({
            title: 'Notifikasi',
            text: "{{ session('pesan') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @endsection
</x-layout>
