<x-dashboard-layout>


        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <a href="/audiobooks/create" class="inline-flex px-5 py-3 text-white bg-amber-600 hover:bg-amber-700  rounded-md ml-6 my-5">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Upload Audibook Baru
              </a>


        </div>
        <div>

            <h2 class="font-inter font-semibold">Your Audiobooks</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full gap-2 p-3">
                @forelse($audiobooks as $audiobook)
                    <div class="bg-white p-3 mb-2 flex justify-between rounded-md shadow-sm">

                        <!-- Title of the Audiobook -->
                        <div>
                            {{ $audiobook->title }}
                        </div>

                        <!-- Edit and Delete buttons -->
                        <div>
                            <a href="{{ route('audiobooks.edit', $audiobook->id) }}" class="text-white bg-blue-600 rounded-md px-3 py-1">Edit</a>
                            <form action="{{ route('audiobooks.destroy', $audiobook->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 rounded-md px-3 py-1" onclick="return confirm('Are you sure you want to delete this audiobook?');">Delete</button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="text-center text-gray-500 p-5">
                        You don&#39;t have any audiobooks. Let&#39;s add one using the button above.
                    </div>
                @endforelse
            </div>

        </div>
      </x-dashboard-layout>
