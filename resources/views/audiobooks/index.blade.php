<x-layout>

    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Audiobook</h2>



    <div class="py-5  mb-5">
        <div class="flex justify-between my-2">
            <h1>Trending for this Week</h1>
            <a href="" class="font-semibold">Show All</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">
            @foreach ($trendings->take(4) as $trending)
                <a href="{{ route('audiobooks.show', $trending->id) }}"
                   class="flex items-center p-4 border rounded-lg shadow-sm hover:bg-pink hover:text-white transition">

                    @if ($trending->cover)
                        <img src="{{ asset('storage/' . $trending->cover) }}"
                             alt="Cover of {{ $trending->title }}"
                             class="w-20 h-20 object-cover rounded-md mr-4">
                    @endif

                    <div class="flex-1">
                        <h2 class="text-lg font-semibold truncate mb-1">{{ $trending->title }}</h2>
                        <p class="text-sm  truncate">Speaker: {{ $trending->speaker->name }}</p>
                        <p class="text-xs ">Duration: {{ $trending->duration }}</p> <!-- tambahkan jika ada durasi -->
                    </div>

                    <button class="ml-4 text-gray-500 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-5.197-3.07A2 2 0 007 9.846v6.307a2 2 0 002.555 1.885l5.197-3.069a2 2 0 000-3.462z" />
                        </svg>
                    </button>
                </a>
            @endforeach
        </div>

    </div>


    <div class="grid grid-cols-4 gap-4">
        @foreach ($audiobooks as $audiobook)
            <a href="{{ route('audiobooks.show', $audiobook->id) }}" class="block p-4 border rounded hover:bg-slate-100">

                @if ($audiobook->cover)
                    <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-46 mb-4 rounded-md">
                @endif
                <h2 class=" font-bold mb-2">{{ $audiobook->title }}</h2>
                <p class="text-sm text-gray-600">Speaker: {{ $audiobook->speaker->name }}</p>

            </a>
        @endforeach
    </div>


</x-layout>
