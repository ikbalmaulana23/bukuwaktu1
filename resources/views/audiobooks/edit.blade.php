<x-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Audiobook</h1>
    
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('audiobooks.update', $audiobook->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
    
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $audiobook->title) }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                       focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
    
            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover (Gambar)</label>
                <input type="file" name="cover" id="cover" 
                       class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 
                       rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @if($audiobook->cover)
                    <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover Image" class="mt-2 w-32">
                @endif
            </div>
    
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File Audio (MP3/WAV)</label>
                <input type="file" name="file" id="file" 
                       class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 
                       rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @if($audiobook->file_path)
                    <audio controls class="mt-2 w-full">
                        <source src="{{ asset('storage/' . $audiobook->file_path) }}" type="audio/mpeg">
                    </audio>
                @endif
            </div>
    
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                          focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $audiobook->description) }}</textarea>
            </div>
    
            <div>
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent 
                        shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
    
</x-layout>