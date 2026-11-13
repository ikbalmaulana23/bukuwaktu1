
<x-layout>

    <div class="bg-white w-full">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10">

            {{-- ====================================== --}}
            {{-- SECTION 1: KOLEKSI MINGGU INI --}}
            {{-- ====================================== --}}
{{-- FILTER INFO --}}
<div class="flex justify-center gap-3 mb-5 flex-wrap">
    @if(request('search'))
        <div class="flex justify-center">
            <p class="px-3 py-1 rounded-md border border-blue-500 bg-blue-50 text-blue-700">
                Hasil Pencarian: <strong>{{ request('search') }}</strong>
            </p>
        </div>
    @endif

    @if(request('category'))
        <div class="flex justify-center">
            <p class="px-3 py-1 rounded-md border border-red-500 bg-red-50 text-red-700">
                Kategori: <strong>{{ request('category') }}</strong>
            </p>
        </div>
    @endif
</div>

{{-- KOLEKSI MINGGU INI --}}
@if(!request()->filled('search') && !request()->filled('category'))
@include('partials.weekly-collection')
@endif

            {{-- ====================================== --}}
            {{-- SECTION 2: SEMUA RANGKUMAN --}}
            {{-- ====================================== --}}

            <section>

                {{-- Heading --}}
                <div class="mb-8">

                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Semua Rangkuman
                    </h2>

                    <p class="mt-3 text-sm text-slate-500 sm:text-base">
                        Temukan berbagai rangkuman buku dan wawasan menarik lainnya.
                    </p>

                </div>

                {{-- Pagination Atas --}}
                <div class="mb-6">
                    {{ $posts->links() }}
                </div>

                {{-- Grid Semua Post --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                    @forelse ($posts as $post)

                        <div>
                            @include('partials.post-card', [
                                'post' => $post,
                                'mostRead' => $mostRead,
                                'trending' => $trending,
                                'newArrival' => $newArrival
                            ])
                        </div>

                    @empty

                        <div class="col-span-full text-center py-16">

                            <i class="fa-solid fa-book-open text-4xl text-gray-300 mb-4"></i>

                            <p class="text-gray-500">
                                Topik yang kamu cari tidak ditemukan.
                            </p>

                            <a href="/posts"
                               class="inline-block mt-4 text-blue-600 hover:text-blue-800">
                                &laquo; Kembali ke halaman bookshelf
                            </a>

                        </div>

                    @endforelse

                </div>

                {{-- Pagination Bawah --}}
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>

            </section>

        </div>

    </div>


    {{-- ====================================== --}}
    {{-- SWEETALERT --}}
    {{-- ====================================== --}}

    @section('scripts')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('pesan'))

            <script>
                Swal.fire({
                    title: 'Notifikasi',
                    text: @json(session('pesan')),
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>

        @endif

    @endsection

</x-layout>
