
<x-dashboard-layout>

    <div class="space-y-8">

        {{-- PAGE HEADING --}}
        <section class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-[#173d52]">
                    Ruang Kreator
                </p>

                <h1 class="text-2xl font-bold tracking-tight text-[#173d52] sm:text-3xl">
                    Dashboard BukuWaktu
                </h1>

                <p class="mt-2 text-sm text-[#173d52]">
                    Kelola resume dan karya yang sudah kamu bagikan.
                </p>
            </div>

            <a href="/dashboard/posts"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-yellow-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-yellow-600 sm:w-auto">

                <i class="fa-solid fa-plus"></i>
                Buat Resume Baru

            </a>

        </section>


        {{-- POST SECTION --}}
        <section>

            <div class="mb-4 flex items-center justify-between">

                <div>
                    <h2 class="text-lg font-bold text-[#173d52]">
                        Your Posts
                    </h2>

                    <p class="mt-1 text-xs text-[#173d52]">
                        Daftar resume buku yang kamu buat.
                    </p>
                </div>

                <span class="rounded-full  px-3 py-1 text-xs font-semibold text-[#173d52]">
                    {{ $posts->count() }} Post
                </span>

            </div>


            {{-- POSTS GRID --}}
            @if($posts->count())

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                    @foreach($posts as $post)

                        <article class="flex min-w-0 flex-col justify-between rounded-2xl border border-[#173d52] bg-white p-4 shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-md">

                            <div class="mb-5">

                                <div class="mb-3 flex items-center justify-between">

                                    <span class="rounded-lg bg-blue-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-[#173d52]">
                                        Resume Buku
                                    </span>

                                    <i class="fa-solid fa-book-open text-[#173d52]"></i>

                                </div>

                                <h3 class="line-clamp-2 text-base font-semibold leading-relaxed text-[#173d52]">
                                    {{ $post->title }}
                                </h3>

                            </div>


                            {{-- ACTION BUTTONS --}}
                            <div class="flex gap-2 border-t border-[#173d52] pt-4">

                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="flex flex-1 items-center justify-center gap-2 rounded-lg  px-3 py-2.5 text-xs font-semibold text-[#173d52] transition bg-yellow-100 hover:bg-yellow-200">

                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit

                                </a>

                                <form action="{{ route('posts.destroy', $post->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus resume ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-red-50 px-3 py-2.5 text-xs font-semibold text-red-600 transition hover:bg-red-100">

                                        <i class="fa-solid fa-trash"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="rounded-2xl border border-dashed border-[#173d52] bg-white px-5 py-12 text-center">

                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-[#173d52]">
                        <i class="fa-solid fa-book-open text-2xl"></i>
                    </div>

                    <h3 class="font-semibold text-[#173d52]">
                        Belum ada resume buku
                    </h3>

                    <p class="mx-auto mt-2 max-w-xs text-sm text-[#173d52]">
                        Mulai buat resume pertamamu dan bagikan pengetahuan kepada pembaca lainnya.
                    </p>

                    <a href="/dashboard/posts"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#173d52] px-5 py-3 text-sm font-semibold text-white hover:bg-[#173d52]">

                        <i class="fa-solid fa-plus"></i>
                        Buat Resume

                    </a>

                </div>

            @endif

        </section>

    </div>

</x-dashboard-layout>
