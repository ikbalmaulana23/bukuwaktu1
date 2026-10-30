
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
                You've drifted off the fairway.
            </h1>

            <p class="text-sm md:text-base text-gray-500 max-w-2xl mt-2 leading-relaxed">
                The page you were looking for isn't here,
                or it has moved. Let us guide you back.
            </p>

            <!-- Navigation Buttons -->
            <div class="flex flex-wrap gap-3 mt-7">

                <a href="{{ url('/') }}"
                   class="rounded-lg bg-[#292929] text-white px-5 py-3
                          text-sm font-medium hover:bg-black transition">
                    Back to home
                </a>

                <a href="{{ url('/buku') }}"
                   class="rounded-lg bg-[#f3f3f3] px-5 py-3
                          text-sm font-medium hover:bg-gray-200 transition">
                    Explore books
                </a>

                <a href="mailto:admin@example.com"
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
