@section('scripts')

<x-dashboard-layout>



    <div class="">

        <form action="{{ route('uploadbuku') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- Judul dan Kategori -->
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Judul</label>
                            <div class="mt-2">
                                <div class="flex rounded-md gap-3 w-full">
                                    <input type="text" name="title" id="title" autocomplete="title" class="flex-grow w-1/2 border bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <select name="category_id" id="" class="mx-10 block flex-1 border bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 px-3">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="author_id" class="mx-10" value="{{ Auth::id() }}">
                                </div>
                            </div>
                        </div>

                        <!-- Tipe Postingan -->
                        <div class="sm:col-span-4">
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Tipe Postingan</label>
                            <div class="mt-2">
                                <select name="type" id="type" class="w-full border bg-transparent py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="rangkuman" selected>Rangkuman</option>
                                    <option value="resensi">Resensi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Isi Buku -->
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Isi Buku</label>
                            <div class="mt-2 relative">
                                <input id="body" type="hidden" name="body">
                                <trix-editor input="body" class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" style="overflow: hidden; resize: none; height: 200px;"></trix-editor>
                                <div id="placeholder" class="absolute left-2 top-10 text-gray-400 pointer-events-none">tulis rangkuman bukumu disini :)</div>
                            </div>
                        </div>

                        <script>
                            const trixEditor = document.querySelector('trix-editor');
                            const placeholder = document.getElementById('placeholder');

                            // Menyembunyikan placeholder saat editor diisi
                            trixEditor.addEventListener("trix-change", function() {
                                if (trixEditor.editor.getDocument().toString().trim() !== "") {
                                    placeholder.style.display = "none";
                                } else {
                                    placeholder.style.display = "block";
                                }
                                // Atur tinggi editor
                                trixEditor.style.height = "auto"; // Reset tinggi agar bisa disesuaikan
                                trixEditor.style.height = (trixEditor.scrollHeight) + "px"; // Set tinggi sesuai konten
                            });

                            // Inisialisasi: Tampilkan placeholder jika editor kosong
                            if (trixEditor.editor.getDocument().toString().trim() === "") {
                                placeholder.style.display = "block";
                            } else {
                                placeholder.style.display = "none";
                            }
                        </script>

                        <!-- Input untuk cover buku -->
                        <div class="col-span-full">
                            <label for="cover" class="block text-sm font-medium leading-6 text-gray-900">Cover Buku (Ukuran 1000 x 1000 px)</label>
                            <div class="mt-2">
                                <input type="file" name="cover" id="cover" accept="image/*" class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Upload Buku</button>
            </div>
        </form>

    </div>


  </x-dashboard-layout>
