
<x-dashboard-layout>

    <div class=" mx-auto px-4 sm:px-6 lg:px-8 pb-6 sm:py-10">

        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 mb-5 transition">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <span class="text-xs font-semibold uppercase tracking-widest text-amber-600">
                        BukuWaktu Creator
                    </span>

                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">
                        Bagikan Pengetahuanmu
                    </h1>

                    <p class="text-sm sm:text-base text-gray-500 mt-2 max-w-xl">
                        Tuangkan ide, pemikiran, dan pelajaran dari buku
                        untuk dibagikan kepada pembaca lainnya.
                    </p>
                </div>

                <div class="hidden sm:flex items-center justify-center w-14 h-14 rounded-2xl bg-amber-50 text-amber-600">
                    <i class="fa-solid fa-book-open text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('uploadbuku') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf

            {{-- Informasi Buku --}}
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5 sm:p-8">

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Informasi Konten
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Lengkapi informasi dasar buku yang ingin kamu bagikan.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    {{-- Judul --}}
                    <div class="sm:col-span-2">
                        <label for="title"
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Konten
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Filosofi Teras — Belajar Mengendalikan Diri"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-900 placeholder:text-gray-400 focus:border-amber-500 focus:ring-2 focus:ring-amber-100 outline-none transition">

                        @error('title')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="category_id"
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            required
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 focus:border-amber-500 focus:ring-2 focus:ring-amber-100 outline-none transition">

                            <option value="">Pilih kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tipe --}}
                    <div>
                        <label for="type"
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Tipe Postingan
                        </label>

                        <select
                            name="type"
                            id="type"
                            required
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 focus:border-amber-500 focus:ring-2 focus:ring-amber-100 outline-none transition">

                            <option value="rangkuman"
                                {{ old('type', 'rangkuman') == 'rangkuman' ? 'selected' : '' }}>
                                Rangkuman
                            </option>

                            <option value="resensi"
                                {{ old('type') == 'resensi' ? 'selected' : '' }}>
                                Resensi
                            </option>
                        </select>

                        @error('type')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" name="author_id" value="{{ Auth::id() }}">

                </div>
            </div>

            {{-- Isi Konten --}}
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5 sm:p-8">

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Isi Konten
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Tuliskan gagasan dan pembelajaran yang ingin kamu bagikan.
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Isi Buku
                    </label>

                    <div class="relative">
                        <input
                            id="body"
                            type="hidden"
                            name="body"
                            value="{{ old('body') }}">

                        <trix-editor
                            input="body"
                            class="trix-content min-h-[300px] sm:min-h-[400px] w-full rounded-xl border border-gray-300 bg-white text-gray-800 focus-within:border-amber-500 focus-within:ring-2 focus-within:ring-amber-100"
                            placeholder="Mulai tuliskan rangkuman atau resensi bukumu di sini...">
                        </trix-editor>
                    </div>

                    @error('body')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    <p class="text-xs text-gray-400 mt-3">
                        <i class="fa-regular fa-lightbulb mr-1"></i>
                        Gunakan paragraf dan subjudul agar tulisan lebih nyaman dibaca.
                    </p>
                </div>
            </div>

            {{-- Cover --}}
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5 sm:p-8">

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Cover Konten
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Tambahkan gambar untuk mempercantik tampilan kontenmu.
                    </p>
                </div>

                <label for="cover"
                    class="group flex flex-col items-center justify-center w-full min-h-48 border-2 border-dashed border-gray-300 rounded-2xl bg-gray-50 hover:bg-amber-50/40 hover:border-amber-400 cursor-pointer transition p-6 text-center">

                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center mb-3 group-hover:scale-105 transition">
                        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                    </div>

                    <span class="text-sm font-semibold text-gray-800">
                        Klik untuk memilih cover
                    </span>

                    <span class="text-xs text-gray-400 mt-2">
                        PNG, JPG atau JPEG · Disarankan 1000 × 1000 px
                    </span>

                    <span id="cover-name"
                        class="text-xs text-amber-600 mt-3 font-medium">
                    </span>

                    <input
                        type="file"
                        name="cover"
                        id="cover"
                        accept="image/*"
                        class="hidden">
                </label>

                @error('cover')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{-- Actions --}}
            <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3 pb-8">

                <p class="text-xs text-gray-400 text-center sm:text-left">
                    Pastikan informasi dan tulisanmu sudah benar.
                </p>

                <button
                    type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-amber-400 hover:bg-amber-500 text-gray-900 font-semibold text-sm px-7 py-3.5 shadow-sm transition active:scale-[0.98]">

                    <i class="fa-solid fa-paper-plane"></i>
                    Publikasikan Konten
                </button>

            </div>

        </form>

    </div>

    {{-- Cover filename --}}
    <script>
        const coverInput = document.getElementById('cover');
        const coverName = document.getElementById('cover-name');

        coverInput.addEventListener('change', function () {
            coverName.textContent = this.files.length
                ? this.files[0].name
                : '';
        });
    </script>

    <style>
        trix-editor {
            padding: 16px;
            line-height: 1.8;
        }

        trix-editor:empty:not(:focus)::before {
            content: attr(placeholder);
            color: #9ca3af;
        }

        trix-editor ul {
            list-style: disc;
            padding-left: 1.5rem;
        }

        trix-editor ol {
            list-style: decimal;
            padding-left: 1.5rem;
        }

        trix-editor blockquote {
            border-left: 3px solid #fbbf24;
            padding-left: 1rem;
            color: #6b7280;
        }
    </style>

</x-dashboard-layout>
