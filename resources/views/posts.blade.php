<x-layout>

    <div class="bg-white">
        <div class="flex justify-between">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Bookshelf</h2>
            <form action="">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500" placeholder="Cari buku yang anda inginkan" type="search" id="search" name="search">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-gray-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-gray-800 focus:ring-4">Search</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="container mx-auto pb-4 ">
            <p id="quote" class="text-md leading-8 text-gray-600 border-gray-200">
                {{ $quote['quote'] ?? 'Quote not found.' }}
            </p>
            <p class="text-gray-400">
                — {{ $quote['author'] ?? 'Unknown author' }}
            </p>
        </div>
 <div class="flex justify-center gap-3 mb-5">
        @if(request('search'))
        <div class="flex justify-center ">
            <p class="px-3 py-1 rounded-md border border-blue-500 bg-blue-50 text-blue-700 ">Hasil Pencarian: <strong>{{ request('search') }}</strong></p>
        </div>
@endif

</div>
        {{ $posts->links() }}

        <div class="sm:text-center flex flex-wrap gap-2">
            <!-- Tombol "All" -->
            <a
                href="/posts"
                class="text-sm relative rounded-full px-6 py-1.5 font-medium text-gray-600 {{ !request('category') ? 'bg-yellow-300 hover:bg-yellow-400 text-white' : 'bg-gray-100 hover:bg-gray-200' }}">
                All
            </a>

            <!-- Tombol untuk masing-masing kategori -->
            @foreach ($categories as $category)
                <a
                    href="/posts?category={{ $category->slug }}"
                    class="text-sm relative rounded-full px-3 py-1.5 font-medium text-gray-600 {{ request('category') === $category->slug ? 'bg-yellow-300 hover:bg-yellow-400 text-white' : 'bg-gray-100 hover:bg-gray-200' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>


        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-4 mt-10">
            @forelse ($posts as $post)
            <div class="relative">
                <span class="absolute top-0 right-0 inline-flex items-center px-3 py-1 text-xs font-semibold ring-1
                {{ $post['type'] === 'resensi' ? 'bg-red-50 text-red-700 ring-red-600/20' : 'bg-green-50 text-green-700 ring-green-600/20' }}
                rounded-tl-none rounded-tr-md rounded-br-none rounded-bl-lg">
                {{ $post['type'] }}
            </span>



                <article class="flex flex-col items-start justify-between border rounded-md p-5">
                    <div class="w-full mb-2">
                        <a href="/posts/{{ $post['slug'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">
                            <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}" class="h-auto w-full rounded-lg" alt="gambar">
                        </a>
                    </div>
                    <div class="group relative"></div>
                    <div class="mt-1 items-center gap-x-4 w-full">
                        <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600 inline">
                            <a href="/posts/{{ $post['slug'] }}" class="mb-3 text-xl tracking-tight font-bold text-gray-900 hover:text-gray-700 inline">{{ Str::limit($post['title'], 20) }}</a>
                        </h3>
                    </div>
                    <a href="/authors/{{ $post->author->username }}" class="text-xs text-gray-600 mb-3 mt-1">
                        Summarized by
                        <span class="absolute font-semibold text-gray-900 mx-2 hover:text-gray-600 ">{{ Str::limit($post->author->name, 20) }}</span>
                    </a>
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
            icon: 'success', // Atur icon sesuai kebutuhan: 'success', 'error', 'warning', dll.
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @endsection
</x-layout>
