
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#fafafa] text-[#292929]">

    <main class="min-h-screen flex flex-col">

        <!-- Error Information -->
        <section class="px-5 pt-8 md:px-16 md:pt-20">

            <p class="text-sm text-gray-500 mb-4">
                Error 404
            </p>

            <h1 class="text-xl md:text-2xl font-medium tracking-tight">
                Kamu Jalan di luar jalur.
            </h1>

            <p class="text-sm md:text-base text-gray-500 max-w-2xl mt-2 leading-relaxed">
                Halaman yang Anda cari tidak ditemukan,
                atau telah dipindahkan. Biarkan kami membantu Anda kembali.
            </p>

            <!-- Navigation Buttons -->
            <div class="flex flex-wrap gap-3 mt-7">

                <a href="{{ url('/') }}"
                   class="rounded-lg bg-[#292929] text-white px-5 py-3
                          text-sm font-medium hover:bg-black transition">
                    Kembali ke beranda
                </a>

                <a href="{{ url('/posts') }}"
                   class="rounded-lg bg-[#f3f3f3] px-5 py-3
                          text-sm font-medium hover:bg-gray-200 transition">
                    Jelajahi buku
                </a>

                <a href="mailto:bukuwaktuofficial@gmail.com"
                   class="rounded-lg bg-[#f3f3f3] px-5 py-3
                          text-sm font-medium hover:bg-gray-200 transition">
                    Contact support
                </a>

            </div>

        </section>

        <!-- Lighthouse Illustration -->

<!-- Lighthouse Illustration -->
<section class="flex-1 flex items-center justify-center
                overflow-hidden mt-6
                md:items-end md:mt-10">

    <img
        src="{{ asset('img/404-lighthouse.png') }}"
        alt="Lighthouse illustration"
        class="w-full max-w-[1400px] object-contain
               object-center
               md:object-bottom"
    >

</section>


    </main>

</body>
</html>
