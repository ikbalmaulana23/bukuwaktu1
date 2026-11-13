
<section class="my-16 border rounded-lg shadow-sm p-4 sm:p-6">

    {{-- Heading --}}
    <div class="text-center mb-8">

        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900">
            Koleksi Minggu Ini
        </h2>

        <p class="mt-3 max-w-xl mx-auto text-sm leading-relaxed text-slate-500 sm:text-base">
            Pilihan rangkuman terbaik untuk menemani rasa ingin tahumu.
        </p>

    </div>

    {{-- Carousel --}}
    <div class="relative group">

        {{-- Tombol Kiri: Desktop --}}
        <button
            type="button"
            onclick="document.getElementById('weeklyCarousel').scrollBy({
                left: -858,
                behavior: 'smooth'
            })"
            class="hidden md:flex absolute left-0 top-1/2
                   -translate-y-1/2 -translate-x-1/2 z-20
                   w-10 h-10 items-center justify-center
                   rounded-full bg-white shadow-lg border border-gray-200
                   text-gray-700 hover:bg-amber-50 transition"
            aria-label="Geser ke kiri"
        >
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        {{-- Daftar Buku --}}
        <div
            id="weeklyCarousel"
            class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-5
                   [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
        >

            @forelse ($weeklyCollection as $post)

                <div class="flex-none w-[260px] snap-start shadow-sm
                            hover:shadow-md transition rounded-lg">

                    @include('partials.post-card', [
                        'post' => $post,
                        'mostRead' => $mostRead,
                        'trending' => $trending,
                        'newArrival' => $newArrival
                    ])

                </div>

            @empty

                <div class="w-full py-12 text-center text-gray-500">
                    <i class="fa-solid fa-book-open text-3xl mb-3"></i>
                    <p>Belum ada koleksi minggu ini.</p>
                </div>

            @endforelse

        </div>

        {{-- Tombol Kanan: Desktop --}}
        <button
            type="button"
            onclick="document.getElementById('weeklyCarousel').scrollBy({
                left: 858,
                behavior: 'smooth'
            })"
            class="hidden md:flex absolute right-0 top-1/2
                   -translate-y-1/2 translate-x-1/2 z-20
                   w-10 h-10 items-center justify-center
                   rounded-full bg-white shadow-lg border border-gray-200
                   text-gray-700 hover:bg-amber-50 transition"
            aria-label="Geser ke kanan"
        >
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </div>


{{-- Slide Indicator --}}
<div id="weeklyIndicators" class="flex justify-center gap-2 mt-3">
</div>


</section>
