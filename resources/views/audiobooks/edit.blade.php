
<x-dashboard-layout>

<div class="min-h-screen ">
    <div class="w-full px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8">
            <a href="/dashboard/audiobooks"
               class="text-sm text-gray-500 hover:text-indigo-600 transition">
                ← Kembali
            </a>

            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-900">
                    Edit Audiobook
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola informasi, cover, audio, dan deskripsi buku.
                </p>
            </div>
        </div>

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <ul class="text-sm text-red-600 list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('audiobook.update', $audiobook->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Main Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                {{-- LEFT COLUMN --}}
                <div class="lg:col-span-5 space-y-6">

                    {{-- Title Card --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">

                        <h2 class="text-base font-semibold text-gray-900 mb-5">
                            Informasi Buku
                        </h2>

                        <label for="title"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Audiobook
                        </label>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $audiobook->title) }}"
                               placeholder="Masukkan judul buku"
                               class="w-full rounded-xl border-gray-300 text-sm
                                      focus:border-indigo-500 focus:ring-indigo-500"
                               required>

                    </div>

                    {{-- Cover Card --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">

                        <h2 class="text-base font-semibold text-gray-900 mb-5">
                            Cover Buku
                        </h2>

                        <div class="flex flex-col sm:flex-row gap-5 items-start">

                            {{-- Current Cover --}}
                            @if($audiobook->cover)
                                <div class="shrink-0">
                                    <img src="{{ asset('storage/' . $audiobook->cover) }}"
                                         alt="Cover Audiobook"
                                         class="w-32 h-44 object-cover rounded-lg shadow-md border border-gray-100">
                                    <p class="text-xs text-gray-400 text-center mt-2">
                                        Cover saat ini
                                    </p>
                                </div>
                            @endif

                            <div class="flex-1 w-full">
                                <label for="cover"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Upload Cover Baru
                                </label>

                                <input type="file"
                                       name="cover"
                                       id="cover"
                                       accept="image/*"
                                       class="block w-full text-sm text-gray-600
                                              file:mr-3 file:py-2 file:px-4
                                              file:rounded-lg file:border-0
                                              file:text-sm file:font-medium
                                              file:bg-indigo-50 file:text-indigo-700
                                              hover:file:bg-indigo-100">

                                <p class="text-xs text-gray-400 mt-3">
                                    Format JPG, PNG atau WEBP.
                                </p>
                                <p class="text-xs text-gray-400">
                                    Kosongkan jika tidak ingin mengganti cover.
                                </p>
                            </div>

                        </div>
                    </div>

                    {{-- Audio Card --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">

                        <h2 class="text-base font-semibold text-gray-900 mb-5">
                            File Audio
                        </h2>

                        <label for="file"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Audio Baru
                        </label>

                        <input type="file"
                               name="file"
                               id="file"
                               accept=".mp3,.wav,audio/mpeg,audio/wav"
                               class="block w-full text-sm text-gray-600
                                      file:mr-3 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:text-sm file:font-medium
                                      file:bg-indigo-50 file:text-indigo-700
                                      hover:file:bg-indigo-100">

                        <p class="text-xs text-gray-400 mt-2">
                            Format MP3 atau WAV.
                        </p>

                        @if($audiobook->file_path)
                            <div class="mt-5 p-4 bg-gray-50 rounded-xl border border-gray-100">

                                <p class="text-xs font-medium text-gray-500 mb-3">
                                    AUDIO SAAT INI
                                </p>

                                <audio controls class="w-full">
                                    <source src="{{ asset('storage/' . $audiobook->file_path) }}">
                                </audio>

                            </div>
                        @endif

                    </div>

                </div>

                {{-- RIGHT COLUMN --}}
                <div class="lg:col-span-7">

                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm h-full">

                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h2 class="text-base font-semibold text-gray-900">
                                    Deskripsi Audiobook
                                </h2>
                                <p class="text-sm text-gray-500 mt-1">
                                    Ceritakan isi dan keunggulan buku.
                                </p>
                            </div>
                        </div>

                        <label for="description"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>

                        <textarea name="description"
                                  id="description"
                                  rows="24"
                                  placeholder="Tuliskan deskripsi atau review audiobook..."
                                  class="w-full min-h-[400px] rounded-xl border-gray-300
                                         text-sm leading-7 text-gray-700
                                         focus:border-indigo-500 focus:ring-indigo-500
                                         resize-y">{{ old('description', $audiobook->description) }}</textarea>

                        <p class="text-xs text-gray-400 mt-3">
                            Gunakan deskripsi yang menarik agar pembaca tertarik mendengarkan audiobook.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Bottom Actions --}}
            <div class="mt-6 bg-white rounded-2xl border border-gray-200 p-4 shadow-sm
                        flex flex-col sm:flex-row items-center justify-between gap-4">

                <p class="text-xs text-gray-500">
                    Pastikan perubahan sudah benar sebelum menyimpan.
                </p>

                <div class="flex w-full sm:w-auto gap-3">

                    <a href="{{ url()->previous() }}"
                       class="flex-1 sm:flex-none text-center px-6 py-3 rounded-xl
                              text-sm font-medium text-gray-600 bg-gray-100
                              hover:bg-gray-200 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="flex-1 sm:flex-none px-8 py-3 rounded-xl
                                   text-sm font-semibold text-white
                                   bg-indigo-600 hover:bg-indigo-700
                                   shadow-sm transition">
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </form>

    </div>
</div>

</x-dashboard-layout>

