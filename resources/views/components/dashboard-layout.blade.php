<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukuwaktu Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    {{-- @vite('resources/css/app.css') --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defera
    ></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >


 <!-- Desktop sidebar -->
 <aside
 class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
>
 <div class="py-4 text-gray-500 dark:text-gray-400 " >
    <div class="w-full flex justify-center rounded-md hover:bg-gray-100">
    <a href="/posts">
    <img src="{{ asset('img/logo.png') }}" alt="" class="w-auto h-auto  px-6"></a>
    </div>
    <x-aside-dashboard/>

 </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div
 x-show="isSideMenuOpen"
 x-transition:enter="transition ease-in-out duration-150"
 x-transition:enter-start="opacity-0"
 x-transition:enter-end="opacity-100"
 x-transition:leave="transition ease-in-out duration-150"
 x-transition:leave-start="opacity-100"
 x-transition:leave-end="opacity-0"
 class="fixed inset-0 z-10 flex items-end bg-opacity-50 sm:items-center sm:justify-center"
></div>
<aside
 class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
 x-show="isSideMenuOpen"
 x-transition:enter="transition ease-in-out duration-150"
 x-transition:enter-start="opacity-0 transform -translate-x-20"
 x-transition:enter-end="opacity-100"
 x-transition:leave="transition ease-in-out duration-150"
 x-transition:leave-start="opacity-100"
 x-transition:leave-end="opacity-0 transform -translate-x-20"
 @click.away="closeSideMenu"
 @keydown.escape="closeSideMenu"
>
 <div class="py-4 text-gray-500 dark:text-gray-400">
   <a
     class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
     href="/posts"
   >
     BukuWaktu
   </a>

   <x-aside-dashboard/>

 </div>
</aside>
<div class="flex flex-col flex-1 w-full">
 <x-header-dashboard/>
 <main class="h-full ">

    <div class="container px-6 mx-auto grid">
{{ $slot }}
</div>


 </main>
</div>
</div>

<script>
    const trixEditor = document.querySelector('trix-editor');
    const placeholder = document.getElementById('placeholder');

    // Menyembunyikan placeholder saat editor diisi
    trixEditor.addEventListener("trix-change", function() {
        if (trixEditor.editor.getDocument().toString().trim() !== "") {
            placeholder.style.display = "none";
        } else {
            placeholder.style.display = "block";
        }
        // Atur tinggi editor
        trixEditor.style.height = "auto"; // Reset tinggi agar bisa disesuaikan
        trixEditor.style.height = (trixEditor.scrollHeight) + "px"; // Set tinggi sesuai konten
    });

    // Inisialisasi: Tampilkan placeholder jika editor kosong
    if (trixEditor.editor.getDocument().toString().trim() === "") {
        placeholder.style.display = "block";
    } else {
        placeholder.style.display = "none";
    }
    function showComingSoonAlert() {
        Swal.fire({
            title: 'Feature Coming Soon!',
            text: 'This feature will be available in the future.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }
</script>


  </body>
</html>
