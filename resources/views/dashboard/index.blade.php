<x-dashboard-layout>

        <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Dashboard
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
          <!-- Card -->
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
              >
                Total Rangkuman
              </p>
              <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
              >
                0
              </p>
            </div>
          </div>
          <!-- Card -->
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
              >
                Total Audiobook
              </p>
              <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
              >
                0
              </p>
            </div>
          </div>
          <!-- Card -->
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
              >
                New sales
              </p>
              <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
              >
                376
              </p>
            </div>
          </div>
          <!-- Card -->
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
            >
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
              >
                Pending contacts
              </p>
              <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
              >
                35
              </p>
            </div>
          </div>

        </div>

        <a href="/dashboard/posts" class="inline-flex mr-3 px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Buat Resume Buku Baru
          </a>
    <h2 class="font-inter font-semibold text-center">Your Posts</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full gap-2 p-3">
        @forelse($posts as $post)
            <div class="bg-white p-3 mb-2 flex flex-col sm:flex-row justify-between rounded-md shadow-sm">
              <div class="mb-2 sm:mb-0">
                {{ $post->title }}
              </div>
              <!-- Edit and Delete Buttons -->
              <div class="flex space-x-2">
                <a href="{{ route('books.edit', $post->id) }}"
                   class="text-white bg-blue-600 rounded-md px-3 py-1 text-center hover:bg-blue-700">
                  Edit
                </a>
                <a href="{{ route('books.destroy', $post->id) }}"
                   class="text-white bg-red-600 rounded-md px-3 py-1 text-center hover:bg-red-700">
                  Delete
                </a>
              </div>
            </div>
        @empty
            <div class="text-center text-gray-500 p-5 w-full">
                You don&#39;t have any summary. Let&#39;s make a summary with the button above.
            </div>
        @endforelse
    </div>


          </div>



    </x-dashboard-layout>
