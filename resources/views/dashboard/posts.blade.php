<x-dashboard-layout>


      
    <div class="">

      <form action="{{ route('uploadbuku') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Judul</label>
                        <div class="mt-2">
                            <div class="flex rounded-md gap-3 w-full">
                                <input type="text" name="title" id="title" autocomplete="title" class="flex-grow w-1/2 border bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                <select name="category_id" id="" class="mx-10 block flex-1 border bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 px-3">
                                    <option value="1">Self Development</option>
                                    <option value="2">Fiction</option>
                                    <option value="3">Buku Kiri</option>
                                    <option value="4">Sains</option>
                                </select>
                                <input type="hidden" name="author_id" class="mx-10" value="{{ Auth::id() }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Isi Buku</label>
                        <div class="mt-2">
                            <input id="body" type="hidden" name="body">
                            <trix-editor input="body" class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 h-72"></trix-editor>
                        </div>
                    </div>
    
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