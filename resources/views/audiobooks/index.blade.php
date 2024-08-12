<x-layout>
    
   
   
   
    <div class="grid grid-cols-4 gap-4">
        @foreach ($audiobooks as $audiobook)
            <div class="p-4 border rounded">
                <h2 class="text-xl font-bold mb-2">{{ $audiobook->title }}</h2>
                <p class="text-gray-600 mb-4">Oleh: {{ $audiobook->speaker->name }}</p>
                @if ($audiobook->cover)
                    <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-46 mb-4">
                @endif
                <p>{{ $audiobook->description }}</p>
                <audio controls class="w-full mt-2">
                    <source src="{{ asset('storage/' . $audiobook->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        @endforeach
    </div>
    
</x-layout>