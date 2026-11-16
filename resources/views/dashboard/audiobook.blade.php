```blade
<x-dashboard-layout>
    <div class="min-h-screen bg-gray-50/70 py-6 sm:py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-8">
                <a href="{{ url()->previous() }}"
                   class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-indigo-600 mb-5 transition">
                    <span>←</span> Kembali
                </a>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl">
                        🎧
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                            Tambah Audiobook
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">
                            Lengkapi informasi dan unggah file audiobook kamu.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Error --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                    <p class="font-semibold mb-2">Periksa kembali data berikut:</p>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Card --}}
            <form action="{{ route('audiobook.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

                @csrf

                <div class="p-5 sm:p-8 space-y-7">

                    {{-- Informasi --}}
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Informasi Audiobook</h2>
                        <p class="text-sm text-gray-500 mt-1">Masukkan detail dasar audiobook.</p>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Audiobook <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Filosofi Teras"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            placeholder="Ceritakan secara singkat isi audiobook ini..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition resize-y"
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Upload --}}
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">File Audiobook</h2>
                        <p class="text-sm text-gray-500 mt-1">Unggah cover dan file audio.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        {{-- Cover --}}
                        <div>
                            <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">
                                Cover Audiobook
                            </label>
                            <label for="cover"
                                   class="flex flex-col items-center justify-center min-h-44 border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/40 transition">
                                <span class="text-3xl mb-3">🖼️</span>
                                <span class="text-sm font-medium text-gray-700">Pilih gambar cover</span>
                                <span class="text-xs text-gray-400 mt-1">JPG, PNG, atau WEBP</span>
                                <input type="file" name="cover" id="cover" accept="image/*" class="hidden">
                            </label>
                            <p class="text-xs text-gray-400 mt-2">Gunakan gambar dengan kualitas yang baik.</p>
                        </div>

                        {{-- Audio --}}
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                                File Audio
                            </label>
                            <label for="file"
                                   class="flex flex-col items-center justify-center min-h-44 border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/40 transition">
                                <span class="text-3xl mb-3">🎵</span>
                                <span class="text-sm font-medium text-gray-700">Pilih file audio</span>
                                <span class="text-xs text-gray-400 mt-1">MP3 atau WAV</span>
                                <input type="file" name="file" id="file" accept=".mp3,.wav,audio/mpeg,audio/wav" class="hidden">
                            </label>
                            <p class="text-xs text-gray-400 mt-2">Pastikan file audio dapat diputar.</p>
                        </div>

                    </div>
                </div>

                {{-- Footer --}}
                <div class="bg-gray-50 border-t border-gray-100 px-5 sm:px-8 py-5 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <a href="{{ url()->previous() }}"
                       class="inline-flex justify-center items-center px-5 py-3 rounded-xl border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex justify-center items-center px-6 py-3 rounded-xl bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition">
                        Simpan Audiobook
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-dashboard-layout>
```
