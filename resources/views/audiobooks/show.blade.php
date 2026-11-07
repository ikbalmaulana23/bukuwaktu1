
<x-layout>

    <div
        x-data="audioPlayer(@js(asset('storage/' . $audiobook->file_path)))"
        class="min-h-screen bg-white pb-36 border"
    >

        {{-- Back Navigation --}}
        <div class="mx-auto px-6 pt-8 border">
            <a href="/audiobook"
               class="text-blue-600 text-sm hover:text-blue-800">
                ← Kembali ke Library
            </a>
        </div>

        {{-- Main Reading Content --}}
        <main class="max-w-3xl mx-auto px-6 py-16 border">

            <div class="mb-6">
                <span class="text-xs uppercase tracking-wider text-gray-500">
                    Audiobook Summary
                </span>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight mb-6 book-title">
                {{ $audiobook->title }}
            </h1>

            {{-- Book Information --}}
            <div class="flex items-center gap-3 mb-12">

                @if($audiobook->cover)
                    <img
                        src="{{ asset('storage/' . $audiobook->cover) }}"
                        class="w-12 h-12 rounded object-cover "
                        alt="{{ $audiobook->title }}"
                    >
                @endif

                <div>
                    <p class="font-semibold text-sm text-slate-800">
                        {{ $audiobook->speaker->name }}
                    </p>

                    <p class="text-xs text-gray-500">
                        Narrator
                    </p>
                </div>

            </div>

            {{-- Description --}}
            <article class="prose prose-lg max-w-none
                            prose-headings:text-slate-900
                            prose-p:text-slate-700
                            prose-p:leading-relaxed book-description">

                {!! nl2br(e($audiobook->description)) !!}

            </article>

        </main>


        {{-- FIXED AUDIO PLAYER --}}
        <div class="fixed bottom-0 left-0 w-full z-50
                    bg-[#062F46] text-white shadow-2xl">

            <div class="max-w-[1600px] mx-auto px-5 md:px-12 py-4">

                {{-- Progress Section --}}
                <div class="flex items-center gap-4 mb-4">

                    {{-- Current Time --}}
                    <span
                        class="text-xs font-semibold w-10"
                        x-text="formatTime(current)"
                    >
                        00:00
                    </span>

                    {{-- Progress Bar --}}
                    <input
                        type="range"
                        min="0"
                        :max="duration || 1"
                        :value="current"
                        @input="seek(Number($event.target.value))"
                        class="flex-1 h-1 accent-white cursor-pointer"
                    >

                    {{-- Remaining Time --}}
                    <span
                        class="text-xs font-semibold w-12 text-right"
                        x-text="'-' + formatTime(Math.max(0, duration - current))"
                    >
                        -00:00
                    </span>

                </div>


                {{-- Player Controls --}}
                <div class="flex items-center justify-between gap-4">

                    {{-- Book Information --}}
                    <div class="flex items-center gap-3 min-w-0 w-1/3">

                        @if($audiobook->cover)
                            <img
                                src="{{ asset('storage/' . $audiobook->cover) }}"
                                class="w-12 h-14 object-cover rounded shadow"
                                alt="{{ $audiobook->title }}"
                            >
                        @endif

                        <div class="min-w-0">
                            <h3 class="font-bold text-sm truncate">
                                {{ $audiobook->title }}
                            </h3>

                            <p class="text-xs text-gray-300 truncate">
                                {{ $audiobook->speaker->name ?? 'Unknown Narrator' }}
                            </p>
                        </div>

                    </div>


                    {{-- Main Controls --}}
                    <div class="flex items-center justify-center gap-5 md:gap-8">

                        {{-- Back 15 Seconds --}}
                        <button
                            @click="skip(-15)"
                            class="hover:text-blue-300 transition"
                            title="Mundur 15 detik"
                        >
                            <span class="text-sm font-semibold">↶ 15</span>
                        </button>


                        {{-- Play / Pause --}}
                        <button
                            @click="toggle()"
                            :disabled="loading"
                            class="w-14 h-14 rounded-full bg-white text-[#062F46]
                                   flex items-center justify-center
                                   hover:scale-105 transition shadow-lg
                                   disabled:opacity-50"
                            title="Play / Pause"
                        >

                            <span x-show="loading" class="text-xs font-bold">
                                ...
                            </span>

                            <svg
                                x-show="!loading && !playing"
                                class="w-7 h-7 ml-1"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path d="M8 5v14l11-7z"/>
                            </svg>

                            <svg
                                x-show="!loading && playing"
                                x-cloak
                                class="w-7 h-7"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path d="M6 5h4v14H6zm8 0h4v14h-4z"/>
                            </svg>

                        </button>


                        {{-- Forward 15 Seconds --}}
                        <button
                            @click="skip(15)"
                            class="hover:text-blue-300 transition"
                            title="Maju 15 detik"
                        >
                            <span class="text-sm font-semibold">15 ↷</span>
                        </button>

                    </div>


                    {{-- Right Controls --}}
                    <div class="flex items-center justify-end gap-4 w-1/3">

                        {{-- Playback Speed --}}
                        <button
                            @click="changeRate(rate >= 2 ? 1 : rate + 0.25)"
                            class="text-sm font-bold hover:text-blue-300"
                            title="Kecepatan audio"
                        >
                            <span x-text="rate + 'x'">1x</span>
                        </button>

                        {{-- Volume Icon --}}
                        <svg
                            class="w-6 h-6 text-gray-300"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 5L6 9H3v6h3l5 4V5z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.5 8.5a5 5 0 010 7"
                            />
                        </svg>

                    </div>

                </div>

            </div>
        </div>

    </div>

</x-layout>
