<x-dashboard-layout>
    <div class="container mx-auto">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-900">Judul Buku</label>
                <input type="text" name="title" id="title"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('title', $post->title) }}">
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-900">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Isi Buku -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-900">Isi Buku</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></trix-editor>
            </div>

            <!-- Cover Buku -->
            <div>
                <label for="cover" class="block text-sm font-medium text-gray-900">Cover Buku</label>
                <div class="flex items-center space-x-4 mt-2">
                    <!-- Preview Cover Lama -->
                    @if ($post->cover)
                        <img src="{{ asset('storage/' . $post->cover) }}" alt="Cover Lama" class="w-24 h-24 object-cover rounded-md">
                    @else
                        <span class="text-gray-500">Tidak ada cover</span>
                    @endif

                    <!-- Input File Baru -->
                    <input type="file" name="cover" id="cover" accept="image/*"
                        class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4">
                <a href="" class="text-sm font-medium text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-indigo-600">
                    Update Buku
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
