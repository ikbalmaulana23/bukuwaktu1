
<section class="mb-16">

    {{-- Heading --}}
    <div class="mb-6 flex items-end justify-between gap-4">
        <div>
            <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                Curated for you
            </span>

            <h2 class="mt-1 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                Koleksi Minggu Ini
            </h2>

            <p class="mt-2 text-sm text-gray-500">
                Audiobook yang sedang menarik perhatian pendengar.
            </p>
        </div>

        <a href="#all-audiobooks"
           class="shrink-0 text-sm font-semibold text-blue-700 transition hover:text-blue-900 hover:underline">
            Lihat semua →
        </a>
    </div>


    {{-- Audiobook Collection --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

        @forelse($weeklyCollection as $audiobook)

            <a href="{{ url('/audiobook/' . $audiobook->id) }}"
               class="group overflow-hidden rounded-2xl border border-gray-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                {{-- Cover --}}
                <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">

                    @if($audiobook->cover)

                        <img
                            src="{{ asset('storage/' . $audiobook->cover) }}"
                            alt="{{ $audiobook->title }}"
                            loading="lazy"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        >

                    @else

                        <div class="flex h-full items-center justify-center bg-gradient-to-br from-blue-100 to-slate-200">
                            <span class="text-5xl">📚</span>
                        </div>

                    @endif


                    {{-- Badges --}}
                    <div class="absolute left-3 top-3 flex flex-wrap gap-2">

                        @if($trendingIds->contains($audiobook->id))
                            <span class="rounded-md bg-pink-600 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-white shadow bg-black">
                                Trending
                            </span>
                        @endif

                        @if($mostReadIds->contains($audiobook->id))
                            <span class="rounded-md bg-amber-400 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-gray-900 shadow">
                                Most Listened
                            </span>
                        @endif

                        @if($newArrivalId == $audiobook->id)
                            <span class="rounded-md bg-emerald-600 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-white shadow">
                                New
                            </span>
                        @endif

                    </div>

                </div>


                {{-- Information --}}
                <div class="p-4">

                    <h3 class="line-clamp-2 min-h-12 text-base font-bold leading-6 text-gray-900 transition group-hover:text-blue-700">
                        {{ $audiobook->title }}
                    </h3>

                    <p class="mt-2 text-sm text-gray-500">
                        {{ $audiobook->speaker->name ?? 'Unknown Speaker' }}
                    </p>

                    <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3">

                        <span class="text-xs font-medium text-gray-400">
                            Audiobook
                        </span>

                        <span class="text-sm font-semibold text-blue-700">
                            Listen Now →
                        </span>

                    </div>

                </div>

            </a>

        @empty

            <div class="col-span-full py-12 text-center text-gray-500">
                <div class="text-4xl mb-3">🎧</div>
                <p>Belum ada koleksi audiobook minggu ini.</p>
            </div>

        @endforelse

    </div>

</section>
