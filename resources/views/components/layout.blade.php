<!doctype html>
<html class="h-full bg-white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

  </script>
</body>
</html>