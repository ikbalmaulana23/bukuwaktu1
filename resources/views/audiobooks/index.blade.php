<x-layout>




    <div class="grid grid-cols-4 gap-4">
        @foreach ($audiobooks as $audiobook)
            <a href="{{ route('audiobooks.show', $audiobook->id) }}" class="block p-4 border rounded">

                @if ($audiobook->cover)
                    <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-46 mb-4 rounded-md">
                @endif
                <h2 class=" font-bold mb-2">{{ $audiobook->title }}</h2>
                <p class="text-sm text-gray-600">Speaker: {{ $audiobook->speaker->name }}</p>

            </a>
        @endforeach
    </div>


</x-layout>
