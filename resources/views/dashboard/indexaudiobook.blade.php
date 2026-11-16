
<x-dashboard-layout>

    <div class="space-y-8">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-amber-600 mb-2">
                    Creator Studio
                </p>

                <h1 class="text-3xl font-bold text-gray-900">
                    Dashboard Audiobook
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Kelola koleksi audiobook yang kamu publikasikan.
                </p>
            </div>

            <a href="/audiobook/create"
               class="inline-flex items-center justify-center gap-2 px-5 py-3
                      bg-amber-500 hover:bg-amber-600 text-white
                      font-semibold rounded-xl shadow-sm transition">

                <i class="fa-solid fa-plus"></i>
                Upload Audiobook

            </a>

        </div>


        {{-- STATISTICS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">Total Audiobook</p>

                        <h3 class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $audiobooks->count() }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600
                                flex items-center justify-center text-xl">
                        <i class="fa-solid fa-headphones"></i>
                    </div>

                </div>

            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">Audiobook Terbaru</p>

                        <h3 class="text-lg font-bold text-gray-900 mt-2">
                            {{ $audiobooks->first()?->created_at?->format('d M Y') ?? '-' }}
                        </h3>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600
                                flex items-center justify-center text-xl">
                        <i class="fa-solid fa-calendar"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- AUDIOBOOK LIST --}}
        <div>

            <div class="flex items-center justify-between mb-5">

                <div>
                    <h2 class="text-xl font-bold text-gray-900">
                        Koleksi Audiobook
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Semua audiobook yang telah kamu unggah.
                    </p>
                </div>

                <span class="text-xs font-semibold bg-amber-50 text-amber-700
                             px-3 py-2 rounded-full">
                    {{ $audiobooks->count() }} Koleksi
                </span>

            </div>


            @if($audiobooks->count() > 0)

                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5">

                    @foreach($audiobooks as $audiobook)

                        <div class="bg-white border border-gray-100 rounded-2xl
                                    overflow-hidden shadow-sm hover:shadow-lg
                                    transition duration-300">

                            {{-- COVER --}}
                            <div class="relative bg-gray-100 h-56 overflow-hidden">

                                <img
                                    src="{{ $audiobook->cover
                                        ? asset('storage/'.$audiobook->cover)
                                        : asset('img/bukuasli1.png') }}"
                                    alt="{{ $audiobook->title }}"
                                    class="w-full h-full object-cover transition duration-500
                                           hover:scale-105"
                                >

                                <div class="absolute top-3 left-3">

                                    <span class="bg-white/95 backdrop-blur
                                                 text-gray-700 text-[10px]
                                                 font-bold uppercase tracking-wider
                                                 px-3 py-2 rounded-lg shadow-sm">
                                        Audiobook
                                    </span>

                                </div>

                            </div>


                            {{-- CONTENT --}}
                            <div class="p-5">

                                <h3 class="text-lg font-bold text-gray-900 line-clamp-2">
                                    {{ $audiobook->title }}
                                </h3>

                                <p class="text-sm text-amber-600 font-medium mt-1">
                                    <i class="fa-solid fa-microphone mr-1"></i>

                                    {{ $audiobook->speaker->name ?? 'Unknown Speaker' }}
                                </p>

                                <p class="text-sm text-gray-500 mt-3 leading-relaxed line-clamp-3">
                                    {{ $audiobook->description ?: 'Belum ada deskripsi.' }}
                                </p>


                                {{-- METADATA --}}
                                <div class="grid grid-cols-2 gap-3 mt-5 py-4
                                            border-y border-gray-100">

                                    <div>
                                        <p class="text-xs text-gray-400 mb-1">
                                            <i class="fa-solid fa-calendar mr-1"></i>
                                            Tanggal Upload
                                        </p>

                                        <p class="text-xs font-semibold text-gray-700">
                                            {{ $audiobook->created_at?->format('d M Y') ?? '-' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-400 mb-1">
                                            <i class="fa-solid fa-headphones mr-1"></i>
                                            File Audio
                                        </p>

                                        <p class="text-xs font-semibold
                                            {{ $audiobook->file_path ? 'text-green-600' : 'text-red-500' }}">

                                            {{ $audiobook->file_path ? 'Tersedia' : 'Belum tersedia' }}

                                        </p>
                                    </div>

                                    {{-- VIEW COUNT --}}
                                    <div class="col-span-2">

                                        <p class="text-xs text-gray-400 mb-1">
                                            <i class="fa-solid fa-eye mr-1"></i>
                                            Jumlah Views
                                        </p>

                                        <p class="text-sm font-bold text-gray-800">

                                            {{ isset($audiobook->views_count)
                                                ? number_format($audiobook->views_count)
                                                : 'Belum tersedia' }}

                                            @if(isset($audiobook->views_count))
                                                <span class="text-xs text-gray-400 font-normal">
                                                    kali dilihat
                                                </span>
                                            @endif

                                        </p>

                                    </div>

                                </div>


                                {{-- ACTION BUTTONS --}}
                                <div class="flex gap-2 mt-4">

                                    <a href="{{ route('audiobook.show', $audiobook->id) }}"
                                       class="flex-1 flex items-center justify-center gap-2
                                              py-2.5 rounded-xl bg-gray-100
                                              hover:bg-gray-200 text-gray-700
                                              text-sm font-semibold transition">

                                        <i class="fa-solid fa-eye"></i>
                                        Preview

                                    </a>

                                    <a href="{{ route('audiobook.edit', $audiobook->id) }}"
                                       class="flex-1 flex items-center justify-center gap-2
                                              py-2.5 rounded-xl bg-amber-50
                                              hover:bg-amber-100 text-amber-700
                                              text-sm font-semibold transition">

                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit

                                    </a>

                                    <form action="{{ route('audiobook.destroy', $audiobook->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus audiobook ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2.5 rounded-xl bg-red-50
                                                       hover:bg-red-100 text-red-600
                                                       transition">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white border border-dashed border-gray-300
                            rounded-2xl p-12 text-center">

                    <i class="fa-solid fa-book-open text-4xl text-gray-300 mb-4"></i>

                    <h3 class="font-bold text-gray-800">
                        Belum Ada Audiobook
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Mulai unggah audiobook pertamamu.
                    </p>

                    <a href="/audiobook/create"
                       class="inline-block mt-5 px-5 py-3 bg-amber-500
                              text-white rounded-xl text-sm font-semibold">

                        Upload Sekarang

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-dashboard-layout>
