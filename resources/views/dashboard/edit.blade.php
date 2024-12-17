<x-dashboard-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Update Buku</h2>

        <!-- Form -->
        <form action="{{ route('books.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-md p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul Buku -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" name="title" id="title"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       value="{{ old('title', $post->title) }}">
                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Isi Buku -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Isi Buku</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body" class="mt-1"></trix-editor>
                @error('body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Cover Buku -->
            <div>
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover Buku</label>
                <div class="flex items-center space-x-4 mt-2">
                    <!-- Preview Cover -->
                    @if ($post->cover)
                        <img src="{{ asset('storage/' . $post->cover) }}" alt="Cover Buku" class="w-32 h-32 object-cover rounded-md shadow">
                    @else
                        <span class="text-gray-500">Tidak ada cover</span>
                    @endif

                    <!-- Input File -->
                    <input type="file" name="cover" id="cover" accept="image/*"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
                </div>
                @error('cover') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('posts') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Buku
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
