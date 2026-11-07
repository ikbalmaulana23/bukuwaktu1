<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Audit Postingan
        </h1>

        <p class="mt-1 text-gray-500">
            Pantau seluruh postingan yang dibuat pengguna.
        </p>
    </div>

    @if (session('success'))
        <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-600">#</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Judul</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Author</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Tanggal</th>
                        <th class="px-6 py-4 font-semibold text-gray-600">Editor's Choice</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($posts as $post)

                        @php
                            $isEditorsChoice = $post->badges()
                                ->where('badge_type', 'editors_choice')
                                ->where(function ($query) {
                                    $query->whereNull('starts_at')
                                        ->orWhere('starts_at', '<=', now());
                                })
                                ->where(function ($query) {
                                    $query->whereNull('ends_at')
                                        ->orWhere('ends_at', '>=', now());
                                })
                                ->exists();
                        @endphp

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $post->title }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $post->author->name ?? 'Unknown' }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $post->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">

                                @if ($isEditorsChoice)

                                    <form action="{{ route('admin.posts.editors-choice.destroy', $post) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                            Hapus Badge
                                        </button>
                                    </form>

                                @else

                                    <form action="{{ route('admin.posts.editors-choice.store', $post) }}"
                                          method="POST">
                                        @csrf

                                        <button type="submit"
                                            class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 hover:bg-blue-100">
                                            + Jadikan Editor's Choice
                                        </button>
                                    </form>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                Belum ada postingan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</x-admin-dashboard-layout>

