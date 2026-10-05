<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>
        <p class="mt-1 text-gray-500">
            Kelola dan pantau aktivitas website.
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Total User</p>
            <h2 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $totalUsers }}
            </h2>
        </div>

        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Total Postingan</p>
            <h2 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $totalPosts }}
            </h2>
        </div>

        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Total Audiobook</p>
            <h2 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $totalAudiobooks }}
            </h2>
        </div>

        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Total Komentar</p>
            <h2 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $totalComments }}
            </h2>
        </div>

    </div>


    {{-- Data Terbaru --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        {{-- User terbaru --}}
        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">

            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="font-semibold text-gray-800">
                    User Terbaru
                </h2>

                <a href="{{ route('admin.users') }}"
                   class="text-sm text-emerald-600 hover:underline">
                    Lihat semua
                </a>
            </div>

            <div class="divide-y">

                @forelse ($latestUsers as $user)

                    <div class="flex items-center justify-between px-6 py-4">

                        <div>
                            <p class="font-medium text-gray-800">
                                {{ $user->name }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ $user->email }}
                            </p>
                        </div>

                        <span class="text-xs text-gray-400">
                            {{ $user->created_at->format('d M Y') }}
                        </span>

                    </div>

                @empty

                    <p class="px-6 py-6 text-sm text-gray-500">
                        Belum ada user.
                    </p>

                @endforelse

            </div>
        </div>


        {{-- Postingan terbaru --}}
        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">

            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="font-semibold text-gray-800">
                    Postingan Terbaru
                </h2>

                <a href="{{ route('admin.posts') }}"
                   class="text-sm text-emerald-600 hover:underline">
                    Lihat semua
                </a>
            </div>

            <div class="divide-y">

                @forelse ($latestPosts as $post)

                    <div class="px-6 py-4">

                        <p class="font-medium text-gray-800">
                            {{ $post->title }}
                        </p>

                        <p class="mt-1 text-sm text-gray-500">
                            Oleh {{ $post->author->name ?? 'Unknown' }}
                        </p>

                    </div>

                @empty

                    <p class="px-6 py-6 text-sm text-gray-500">
                        Belum ada postingan.
                    </p>

                @endforelse

            </div>
        </div>

    </div>

</x-admin-dashboard-layout>
