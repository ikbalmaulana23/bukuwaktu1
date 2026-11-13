{{--
<footer class="mt-16 border-t border-gray-200 bg-gray-50">

    <div class="mx-auto max-w-7xl px-6 py-10 sm:px-8">

        <div class="flex flex-col items-center gap-6 md:flex-row md:justify-between">


            <div class="text-center md:text-left">

                <a href="/" class="text-xl font-bold tracking-tight text-gray-900">
                    Buku<span class="text-amber-500">Waktu</span>
                </a>

                <p class="mt-2 text-xs text-gray-500">
                    Temukan wawasan baru, satu halaman setiap waktu.
                </p>

            </div>


            <nav class="flex flex-wrap justify-center gap-x-6 gap-y-3 text-sm text-gray-500">

                <a href="{{ route('about') }}"
                   class="transition hover:text-gray-900">
                    About Us
                </a>

                <a href="{{ route('contact') }}"
                   class="transition hover:text-gray-900">
                    Contact
                </a>

                <a href="{{ route('privacy-policy') }}"
                   class="transition hover:text-gray-900">
                    Privacy Policy
                </a>

            </nav>

        </div>


        <div class="mt-8 border-t border-gray-200 pt-6 text-center">

            <p class="text-xs text-gray-400">
                © {{ date('Y') }} BukuWaktu. All rights reserved.
            </p>

        </div>

    </div>

</footer> --}}


<footer class="mt-10 border-t border-gray-200 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6">

        <div class="flex flex-col items-center gap-3 sm:flex-row sm:justify-between">

            <span class="text-xs text-gray-400">
                © {{ date('Y') }} BukuWaktu.
            </span>

            <nav class="flex items-center justify-center gap-5 text-xs text-gray-500">
                <a href="{{ route('about') }}" class="hover:text-gray-900 transition">
                    About Us
                </a>

                <a href="{{ route('contact') }}" class="hover:text-gray-900 transition">
                    Contact
                </a>

                <a href="{{ route('privacy-policy') }}" class="hover:text-gray-900 transition">
                    Privacy Policy
                </a>
            </nav>

        </div>

    </div>
</footer>
