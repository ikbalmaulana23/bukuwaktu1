<!doctype html>
<html class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuWaktu</title>

    <!-- Stylesheets -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        #profilePhotoModal {
            transition: opacity 0.3s ease;
        }

        .book-container {
            position: relative;
            width: 165px;
            height: 240px;
            perspective: 1000px;
        }

        .book {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            transition: transform 0.6s ease-in-out;
        }

        .front {
            transform: rotateY(0deg);
        }

        .back {
            transform: rotateY(180deg);
        }

        .book-container:hover .front {
            transform: rotateY(-180deg);
        }

        .book-container:hover .back {
            transform: rotateY(0deg);
        }

        #progress-bar-container {
            position: fixed;
            top: 150px;
            right: 50px;
            width: 5px;
            height: 465px;
            background: rgba(0, 0, 0, 0.01);
            z-index: 9999;
        }

        #progress-bar {
            height: 0%;
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
    </style>
</head>
<body class="h-full">

    <div class="min-h-full">
        <x-navbar></x-navbar>

        <main>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 p-2 md:p-0 pt-20 md:pt-28 overflow-x-hidden">
                {{$slot}}
            </div>
        </main>
    </div>

    <footer class="bg-gray-200 py-3">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex justify-center">
            <p class="text-center text-sm">
                © {{ date('Y') }} bukuwaktu. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        document.getElementById('notification-button')?.addEventListener('click', () => {
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    const notificationList = document.getElementById('notification-list');
                    notificationList.innerHTML = '';
                    data.notifications.forEach(notification => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item';
                        li.innerHTML = `<a href="/posts/${notification.data.post_id}">${notification.data.author_name} uploaded a new post: ${notification.data.post_title}</a>`;
                        notificationList.appendChild(li);
                    });
                    document.getElementById('notification-count').innerText = data.unread_count;
                });
        });

        document.getElementById('openModal')?.addEventListener('click', () => {
            document.getElementById('profileModal').classList.remove('hidden');
        });

        document.getElementById('closeModal')?.addEventListener('click', () => {
            document.getElementById('profileModal').classList.add('hidden');
        });

        window.addEventListener('click', event => {
            const modal = document.getElementById('profileModal');
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });

        document.getElementById('prev')?.addEventListener('click', () => {
            document.getElementById('slider').scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        document.getElementById('next')?.addEventListener('click', () => {
            document.getElementById('slider').scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });

        document.getElementById('prev-audiobook')?.addEventListener('click', () => {
            document.getElementById('audiobook-slider').scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        document.getElementById('next-audiobook')?.addEventListener('click', () => {
            document.getElementById('audiobook-slider').scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });

        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sesi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!'
            }).then(result => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
        @if(session('pesan') == 'berhasil login')
            Swal.fire({

                text: 'Selamat datang kembali!',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });
        @elseif(session('pesan') == 'login gagal')
            Swal.fire({

                text: 'Email atau password salah!',
                icon: 'error',
                confirmButtonText: 'Coba Lagi',
                width: '400px'
            });
        @elseif(session('pesan') == 'berhasil logout')
            Swal.fire({

                text: 'Anda telah logout.',
                icon: 'success',
                confirmButtonText: 'OK',
                width: '400px'
            });
        @endif

        document.addEventListener('scroll', function () {
        const scrollTop = window.scrollY; // Jarak gulir dari atas
        const documentHeight = document.documentElement.scrollHeight; // Tinggi total dokumen
        const windowHeight = window.innerHeight; // Tinggi viewport

        // Hitung persentase scroll
        const scrollPercent = Math.round((scrollTop / (documentHeight - windowHeight)) * 100);

        // Perbarui tinggi progress bar
        document.getElementById('progress-bar').style.height = scrollPercent + '%';

        // Perbarui teks persentase
        document.getElementById('progress-percent').textContent = scrollPercent + '%';
    });

    </script>
{{-- @yield('scripts') --}}
</body>
</html>
