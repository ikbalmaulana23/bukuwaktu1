
<x-layout>

    @php
        $newArrivalId = $audiobooks->first()?->id;
    @endphp

    <main class="min-h-screen bg-white">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- ====================================== --}}
            {{-- WEEKLY AUDIOBOOK COLLECTION --}}
            {{-- ====================================== --}}

            @if($weeklyCollection->isNotEmpty())

                @include('partials.weekly-audiobook-collection')

            @endif


            {{-- ====================================== --}}
            {{-- HERO SECTION --}}
            {{-- ====================================== --}}

            <section class="relative mb-12 overflow-hidden rounded-3xl bg-[#0F4C75] px-6 py-12 text-white sm:px-10 lg:px-14 lg:py-16">

                <div class="relative z-10 max-w-2xl">

                    <span class="inline-flex items-center rounded-full border border-white/30 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-blue-100">
                        BukuWaktu Audio Library
                    </span>

                    <h1 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
                        Listen. Learn.
                        <span class="text-yellow-300">Grow.</span>
                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100 sm:text-base">
                        Temukan wawasan baru melalui audiobook pilihan.
                        Dengarkan ide-ide hebat dan kembangkan pengetahuanmu,
                        kapan saja dan di mana saja.
                    </p>

                    <a href="#all-audiobooks"
                       class="mt-7 inline-flex items-center gap-2 rounded-xl bg-yellow-400 px-5 py-3 text-sm font-bold text-slate-900 transition hover:bg-yellow-300">

                        Explore Audiobooks
                        <span aria-hidden="true">→</span>

                    </a>

                </div>


                {{-- Decorative Background --}}
                <div class="pointer-events-none absolute -right-10 -top-20 h-72 w-72 rounded-full bg-blue-400/20 blur-3xl"></div>

                <div class="pointer-events-none absolute -bottom-32 right-20 h-72 w-72 rounded-full bg-yellow-300/10 blur-3xl"></div>


                {{-- Audiobook Illustration --}}
                <div class="pointer-events-none absolute bottom-0 right-8 hidden h-64 w-64 items-center justify-center lg:flex">

                    <div class="flex h-48 w-36 rotate-6 items-center justify-center rounded-2xl border border-white/20 bg-white/10 shadow-2xl backdrop-blur-sm">

                        <div class="text-center">

                            <span class="text-5xl">🎧</span>

                            <p class="mt-3 text-xs font-bold tracking-widest text-white/80">
                                BOOKUWAKTU
                            </p>

                        </div>

                    </div>

                </div>

            </section>



            {{-- ====================================== --}}
            {{-- ALL AUDIOBOOKS --}}
            {{-- ====================================== --}}

            <section id="all-audiobooks" class="scroll-mt-8">

                {{-- Heading --}}
                <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

                    <div>

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Discover
                        </span>

                        <h2 class="mt-1 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            All Audiobooks
                        </h2>

                        <p class="mt-2 text-sm text-gray-500">
                            Jelajahi seluruh koleksi audiobook BukuWaktu.
                        </p>

                    </div>

                    <span class="text-sm text-gray-500">
                        {{ $audiobooks->count() }} audiobook tersedia
                    </span>

                </div>



                {{-- Audiobook Grid --}}
                @if($audiobooks->isNotEmpty())

                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-4 xl:grid-cols-5">

                        @foreach($audiobooks as $audiobook)

                            <a href="{{ url('/audiobook/' . $audiobook->id) }}"
                               class="group min-w-0 overflow-hidden rounded-2xl border border-gray-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                                {{-- COVER --}}
                                <div class="relative aspect-[3/4] overflow-hidden bg-gray-100">

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


                                    {{-- BADGES --}}
                                    <div class="absolute left-2 top-2 flex flex-wrap gap-1.5">

                                        {{-- Trending --}}
                                        @if($trendingIds->contains($audiobook->id))

                                            <span class="rounded-md bg-pink-600 px-2 py-1 text-[9px] font-bold uppercase tracking-wide bg-black text-white shadow">
                                                Trending
                                            </span>

                                        @endif


                                        {{-- Most Listened --}}
                                        @if($mostReadIds->contains($audiobook->id))

                                            <span class="rounded-md bg-amber-400 px-2 py-1 text-[9px] font-bold uppercase tracking-wide text-gray-900 shadow">
                                                Most Listened
                                            </span>

                                        @endif


                                        {{-- New Arrival --}}
                                        @if($newArrivalId == $audiobook->id)

                                            <span class="rounded-md bg-emerald-600 px-2 py-1 text-[9px] font-bold uppercase tracking-wide text-white shadow">
                                                New
                                            </span>

                                        @endif

                                    </div>

                                </div>



                                {{-- INFORMATION --}}
                                <div class="p-3 sm:p-4">

                                    <h3 class="line-clamp-2 min-h-10 text-sm font-bold leading-5 text-gray-900 transition group-hover:text-blue-700 sm:text-base">
                                        {{ $audiobook->title }}
                                    </h3>

                                    <p class="mt-2 truncate text-xs text-gray-500 sm:text-sm">
                                        {{ $audiobook->speaker->name ?? 'Unknown Speaker' }}
                                    </p>

                                    <div class="mt-3 border-t border-gray-100 pt-3">

                                        <span class="text-xs font-semibold text-blue-700 group-hover:underline">
                                            Listen Now →
                                        </span>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>


                @else

                    {{-- Empty State --}}
                    <div class="rounded-2xl border border-dashed border-gray-300 px-6 py-16 text-center">

                        <div class="text-4xl">🎧</div>

                        <h3 class="mt-4 text-lg font-bold text-gray-800">
                            Belum ada audiobook
                        </h3>

                        <p class="mt-2 text-sm text-gray-500">
                            Koleksi audiobook akan segera hadir di sini.
                        </p>

                    </div>

                @endif

            </section>

        </div>

    </main>

</x-layout>
