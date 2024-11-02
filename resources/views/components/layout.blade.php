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


  <style>
    #profilePhotoModal {
        transition: opacity 0.3s ease;
    }


</style>
</head>
<body class="h-full">

  <div class="min-h-full">
    <x-navbar></x-navbar>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 pt-28">
            {{$slot}}
        </div>
    </main>


</div>
<footer class="bg-gray-200  py-3">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
// $(document).ready(function() {
//               $('#refresh-quote').click(function() {
//                   $.ajax({
//                       url: '{{ route('quotes.refresh') }}',
//                       type: 'POST',
//                       data: {
//                           _token: '{{ csrf_token() }}'
//                       },
//                       success: function(response) {
//                           $('#quote').text(response.quote.text);
//                       },
//                       error: function(xhr) {
//                           console.log('Error:', xhr.responseText);
//                       }
//                   });
//               });
//           });


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
