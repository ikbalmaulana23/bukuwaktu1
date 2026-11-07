<!doctype html>
<html class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <title>BukuWaktu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Vite --}}

@vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- External stylesheets --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    {{-- External scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- Previously used Howler.js script; kept commented out as in the original --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script> --}}

    <style>
        html {
            scroll-behavior: smooth;
        }

        #profilePhotoModal {
            transition: opacity 0.3s ease;
        }

        .book-container {
            position: relative;
            width: 165px; /* Ubah sesuai kebutuhan */
            height: 240px; /* Ubah sesuai kebutuhan */
            perspective: 1000px; /* Memberikan efek 3D */
        }

        .book {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden; /* Sembunyikan sisi belakang */
            transition: transform 0.6s ease-in-out;
        }

        .front {
            transform: rotateY(0deg); /* Awalnya tidak berputar */
        }

        .back {
            transform: rotateY(180deg); /* Sisi belakang */
        }

        .book-container:hover .front {
            transform: rotateY(-180deg); /* Putar ke belakang */
        }

        .book-container:hover .back {
            transform: rotateY(0deg); /* Tampilkan sisi belakang */
        }

        #progress-bar-container {
            position: fixed;
            top: 150px;
            right: 50px; /* Sisi kanan halaman */
            width: 5px; /* Lebar progress bar */
            height: 465px; /* Tinggi penuh untuk halaman */
            background: rgba(0, 0, 0, 0.01);
            z-index: 9999;
        }

        #progress-bar {
            height: 0%; /* Progress bar mulai dari 0% */
            width: 100%;
            background: #2d312e;
            transition: height 0.2s ease-out;
        }

        #progress-percent {
            position: fixed;
            top: 100px;
            right: 50px;
            font-size: 14px;
            font-weight: bold;
            color: #2d312e;
            z-index: 10000;
            mix-blend-mode: difference;
            pointer-events: none;
        }

        .highlight-text {
            position: relative;
            display: inline-block;
            padding: 0 5px;
        }

        .highlight-text::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            animation: highlightAnimation 5s ease-in-out forwards;
            z-index: -1;
            width: 0%;
        }

        .custom-swal-height {
            height: 250px; /* Atur tinggi sesuai kebutuhan */
        }

        @keyframes highlightAnimation {
            0% {
                width: 0%;
                background-color: white;
            }

            50% {
                width: 0;
                background-color: white;
            }

            100% {
                width: 100%;
                background-color: #FFF9C4;
            }
        }

        [x-cloak] {
            display: none;
        }

        /*
         * Marquee:
         * Disembunyikan secara default untuk mencegah flash sebelum status dibaca.
         * JavaScript di bawah marquee akan menampilkan elemen jika diperlukan.
         */

.marquee-track {
    display: flex;
    width: max-content;
    animation: marquee 25s linear infinite;
}

@keyframes marquee {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}

    </style>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <main>
            <div class="mx-auto max-w-7xl overflow-x-hidden p-2 pt-20 md:p-0 md:pt-24 sm:px-6 lg:px-8">

                {{-- Announcement marquee --}}

{{--   --}}


                {{ $slot }}
            </div>
        </main>
    </div>

    {{-- Footer --}}
    <footer class="mt-10 w-full bg-gray-100 py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-2 text-sm">
                <span class="mx-1 font-semibold text-gray-500">
                    © {{ date('Y') }} Bukuwaktu.
                </span>

                <a href="{{ route('about') }}" class="mx-1 transition hover:text-blue-500">
                    About Us
                </a>

                <a href="{{ route('contact') }}" class="mx-1 transition hover:text-blue-500">
                    Contact Us
                </a>

                <a href="{{ route('privacy-policy') }}" class="mx-1 transition hover:text-blue-500">
                    Privacy Policy
                </a>
            </div>
        </div>
    </footer>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Existing page interactions; guarded so missing elements do not stop other scripts --}}
    <script>
        // Notification button
        const notificationButton = document.getElementById('notification-button');

        notificationButton?.addEventListener('click', function () {
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    const notificationList = document.getElementById('notification-list');
                    const notificationCount = document.getElementById('notification-count');

                    if (!notificationList || !notificationCount) {
                        return;
                    }

                    notificationList.innerHTML = '';

                    data.notifications.forEach(notification => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item';

                        const link = document.createElement('a');
                        link.href = `/posts/${notification.data.post_id}`;
                        link.textContent = `${notification.data.author_name} uploaded a new post: ${notification.data.post_title}`;

                        li.appendChild(link);
                        notificationList.appendChild(li);
                    });

                    notificationCount.innerText = data.unread_count;
                })
                .catch(error => {
                    console.error('Gagal memuat notifikasi:', error);
                });
        });

        // Profile modal
        document.getElementById('openModal')?.addEventListener('click', function () {
            document.getElementById('profileModal')?.classList.remove('hidden');
        });

        document.getElementById('closeModal')?.addEventListener('click', function () {
            document.getElementById('profileModal')?.classList.add('hidden');
        });

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('profileModal');

            if (modal && event.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Book slider
        document.getElementById('prev')?.addEventListener('click', function () {
            document.getElementById('slider')?.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        document.getElementById('next')?.addEventListener('click', function () {
            document.getElementById('slider')?.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });

        // Audiobook slider
        document.getElementById('prev-audiobook')?.addEventListener('click', function () {
            document.getElementById('audiobook-slider')?.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        document.getElementById('next-audiobook')?.addEventListener('click', function () {
            document.getElementById('audiobook-slider')?.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });
    </script>

    @yield('scripts')

    {{-- Plyr --}}
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
</body>
</html>
