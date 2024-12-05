<!doctype html>
<html class="h-full bg-white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


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
    right: 50px; /* Sisi kiri halaman */
    width: 5px; /* Lebar progress bar */
    height: 465px; /* Tinggi penuh untuk halaman */
    background: rgba(0, 0, 0, 0.01); /* Warna latar belakang progress bar */
    z-index: 9999;
}

#progress-bar {
    height: 0%; /* Progress bar mulai dari 0% */
    width: 100%;
    background: #2d312e; /* Warna progress bar */
    transition: height 0.2s ease-out;
}

#progress-percent {
    position: fixed;
    top: 100px; /* Atur jarak dari atas */
    right: 50px; /* Jarak dari progress bar ke teks */
    font-size: 14px;
    font-weight: bold;
    color: #2d312e; /* Warna teks default */
    z-index: 10000; /* Pastikan terlihat di atas elemen lain */
    mix-blend-mode: difference; /* Blending untuk menyesuaikan warna dengan latar belakang */
    pointer-events: none; /* Agar tidak mengganggu klik di bawahnya */
}

.highlight-text {
  position: relative;
  display: inline-block;
  padding: 0 5px; /* Memberikan sedikit ruang di sekitar teks */
}

.highlight-text::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: white;  /* Mulai dengan warna putih */
  animation: highlightAnimation 5s ease-in-out forwards;
  z-index: -1; /* Menjaga background di belakang teks */
  width: 0%; /* Mulai dengan lebar 0% */
}



.custom-swal-height {
            height: 250px; /* Atur tinggi sesuai kebutuhan, misalnya 250px */
        }

@keyframes highlightAnimation {
  0% {
    width: 0%; /* Background tidak terlihat di awal */
    background-color: white; /* Mulai dengan warna putih */
  }
  50% {
    width: 0; /* Background mengisi lebar teks */
    background-color: white; /* Tetap putih di tengah animasi */
  }
  100% {
    width: 100%; /* Background tetap penuh */
    background-color: #FFF9C4; /* Warna kuning pastel di akhir animasi */
  }
}
[x-cloak] {
  display: none;
}

</style>
</head>
<body class="h-full ">

  <div class="min-h-full">
    <x-navbar></x-navbar>

    <main class="">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8 p-2 md:p-0 pt-20 md:pt-28 overflow-x-hidden">
            {{$slot}}
        </div>
    </main>


</div>


<footer class="bg-gray-200  py-3">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex justify-center">
      <p class="text-center text-sm">
          © {{ date('Y') }} bukuwaktu. All rights reserved.
      </p>

  </div>
</footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

    document.getElementById('notification-button').addEventListener('click', function () {
    fetch('/notifications')
        .then(response => response.json())
        .then(data => {
            let notificationList = document.getElementById('notification-list');
            notificationList.innerHTML = '';  // Kosongkan daftar sebelumnya
            data.notifications.forEach(notification => {
                let li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `<a href="/posts/${notification.data.post_id}">${notification.data.author_name} uploaded a new post: ${notification.data.post_title}</a>`;
                notificationList.appendChild(li);
            });
            document.getElementById('notification-count').innerText = data.unread_count;
        });
});


document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('profileModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('profileModal').classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
        const modal = document.getElementById('profileModal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    document.getElementById('prev').addEventListener('click', function() {
    document.getElementById('slider').scrollBy({
        left: -200, // Sesuaikan jarak scroll ke kiri
        behavior: 'smooth'
    });
});

document.getElementById('next').addEventListener('click', function() {
    document.getElementById('slider').scrollBy({
        left: 200, // Sesuaikan jarak scroll ke kanan
        behavior: 'smooth'
    });
});


document.getElementById('prev-audiobook').addEventListener('click', function() {
    document.getElementById('audiobook-slider').scrollBy({
        left: -200, // Sesuaikan jarak scroll ke kiri
        behavior: 'smooth'
    });
});

document.getElementById('next-audiobook').addEventListener('click', function() {
    document.getElementById('audiobook-slider').scrollBy({
        left: 200, // Sesuaikan jarak scroll ke kanan
        behavior: 'smooth'
    });
});



  </script>
    @yield('scripts')
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>

</body>
</html>
