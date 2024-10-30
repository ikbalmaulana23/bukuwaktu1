<nav class="shadow-md border-b bg-gray-50  fixed w-full z-20"  x-data="{isOpen : false}   ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <a href="/" class="flex-shrink-0">
            <img class="h-14  " src="{{ asset('img/logo.png') }}" alt="Your Company">
          </a>

        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-10">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts')">Buku</x-nav-link>
            <x-nav-link href="/genre" :active="request()->is('genre')">Genre</x-nav-link>
            <x-nav-link href="/audiobooks" :active="request()->is('audiobooks')">Audiobook</x-nav-link>

          </div>
        </div>
        <div class="hidden md:block">
          <div class=" flex items-center  ml-24">
            @if(auth()->check())
            <!-- User is logged in -->

            <div x-data="{ isNotificationOpen: false, isUserMenuOpen: false }" class="flex items-center space-x-3">
              <!-- Notification Button -->
              <button type="button"
                      @click="isNotificationOpen = !isNotificationOpen; isUserMenuOpen = false"
                      class="relative flex max-w-xs items-center rounded-full bg-white border border-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                      id="notification-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">View notifications</span>
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                  </svg>
              </button>

              <!-- Notification Dropdown -->
              <div x-show="isNotificationOpen"
                   x-cloak
                   @click.away="isNotificationOpen = false"
                   x-transition:enter="transition ease-out duration-100 transform"
                   x-transition:enter-start="opacity-0 scale-95"
                   x-transition:enter-end="opacity-100 scale-100"
                   x-transition:leave="transition ease-in duration-75 transform"
                   x-transition:leave-start="opacity-100 scale-100"
                   x-transition:leave-end="opacity-0 scale-95"
                   class="absolute top-12 right-48 mt-2 w-48 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 px-5 ring-black ring-opacity-5 focus:outline-none"
                   role="menu" aria-orientation="vertical" aria-labelledby="notification-button" tabindex="-1">
                  <div>Notifications <span id="notification-count" class="badge bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span></div>
                  <hr>
                  @foreach(Auth::user()->unreadNotifications as $notification)
                      <li class="list-group-item">
                          <a href="{{ url('/posts/' . $notification->data['post_id']) }}" class="text-sm">
                              {{ $notification->data['author_name'] }} uploaded a new post: {{ $notification->data['post_title'] }}
                          </a>
                      </li>
                  @endforeach
              </div>

              <!-- User Menu Button -->
              <button type="button"
                      @click="isUserMenuOpen = !isUserMenuOpen; isNotificationOpen = false"
                      class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                      id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full"
                  src="{{ Auth::user()->profile_photo ? asset('storage/profile_photos/' . Auth::user()->profile_photo) : asset('img/avatar.png') }}"
                  alt="Profile Photo">
              </button>

              <!-- User Dropdown -->
              <div x-show="isUserMenuOpen"
                   x-cloak
                   @click.away="isUserMenuOpen = false"
                   x-transition:enter="transition ease-out duration-100 transform"
                   x-transition:enter-start="opacity-0 scale-95"
                   x-transition:enter-end="opacity-100 scale-100"
                   x-transition:leave="transition ease-in duration-75 transform"
                   x-transition:leave-start="opacity-100 scale-100"
                   x-transition:leave-end="opacity-0 scale-95"
                   class="absolute top-12 right-36 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                   role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                      {{ auth()->user()->name }}
                  </a>
                  <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Upload Buku</a>
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>
          </div>

        @else
            <!-- User is not logged in -->
            <div>
                <a href="{{ route('login') }}" class="flex items-center space-x-2 text-gray-800 ">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
            </div>
        @endif

          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg  :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/posts" :active="request()->is('posts')">Buku</x-nav-link>
        <x-nav-link href="/genre" :active="request()->is('genre')">Genre</x-nav-link>
        <x-nav-link href="/audiobooks" :active="request()->is('audiobooks')">Audiobook</x-nav-link>

      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        @auth
        <div class="flex items-center px-5">

            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>


          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        @endauth
        <div class=" space-y-1 px-2">
            @guest
                <!-- Tampilkan jika belum login -->

                <a href="/login" class=" rounded-md px-3 py-2 text-md font-medium text-gray-700 hover:bg-gray-700 hover:text-white flex justify-between items-center">
                    <span>Login</span>
                    <i class="fas fa-sign-in-alt ml-2"></i>
                </a>

            @else
                <!-- Tampilkan jika sudah login -->
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">{{ auth()->user()->name }}</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            @endguest
        </div>

      </div>
    </div>
  </nav>
