
@php
    $isEditorsChoice = $post->badges->contains(function ($badge) {
        return $badge->badge_type === 'editors_choice'
            && (!$badge->starts_at || $badge->starts_at <= now())
            && (!$badge->ends_at || $badge->ends_at >= now());
    });

    $isMostRead = $mostRead->contains(function ($item) use ($post) {
        return $item->content_type === 'post'
            && $item->id === $post->id;
    });

    $isTrending = $trending->contains(function ($item) use ($post) {
        return $item->content_type === 'post'
            && $item->id === $post->id;
    });

    $isNewArrival = $newArrival->contains($post->id);
@endphp

<article class="h-full flex flex-col items-start justify-between border border-gray-200 rounded-md p-5 bg-white">

    {{-- Cover dan Badge --}}
    <div class="relative w-full mb-2 h-64 overflow-hidden rounded-lg">

        <a href="/posts/{{ $post->slug }}" class="block w-full h-full">
            <img
                src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('img/bukuasli1.png') }}"
                class="h-full w-full object-cover"
                alt="{{ $post->title }}"
            >
        </a>

        {{-- Badge --}}
        <div class="absolute top-2 right-2 z-10 flex flex-col items-end gap-2">

            @if($isMostRead)
                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-gray-900 text-white rounded-lg shadow-sm">
                    <i class="fa-solid fa-fire text-yellow-400"></i>
                    The Most Read
                </span>
            @endif

            @if($isTrending)
                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-orange-600 text-white rounded-lg shadow-sm">
                    <i class="fa-solid fa-arrow-trend-up text-yellow-300"></i>
                    Trending
                </span>
            @endif

            @if($isEditorsChoice)
                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-blue-700 text-white rounded-lg shadow-sm">
                    <i class="fa-solid fa-star text-yellow-300"></i>
                    Editor's Choice
                </span>
            @endif

            @if($isNewArrival)
                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-purple-700 text-white rounded-lg shadow-sm">
                    <i class="fa-solid fa-certificate text-yellow-300"></i>
                    New Arrival
                </span>
            @endif

        </div>
    </div>

    {{-- Judul --}}
    <div class="mt-1 w-full">
        <h3 class="my-2 text-xl font-semibold leading-6 text-gray-900">
            <a href="/posts/{{ $post->slug }}"
               class="tracking-tight font-bold hover:text-gray-700">
                {{ Str::limit($post->title, 20) }}
            </a>
        </h3>
    </div>

    {{-- Author --}}
    <div class="text-xs text-gray-600 mb-3 mt-1 flex items-center flex-wrap gap-1">

        <span>Summarized by</span>

        <a href="/authors/{{ $post->author->username }}"
           class="inline-flex items-center gap-1 font-semibold text-gray-900 hover:text-gray-600">

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
