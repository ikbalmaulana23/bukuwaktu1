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


