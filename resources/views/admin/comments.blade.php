<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Audit Komentar
        </h1>

        <p class="mt-1 text-gray-500">
            Pantau komentar yang dibuat pengguna.
        </p>
    </div>

    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-600">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            User
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Postingan
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Komentar
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Tanggal
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($comments as $comment)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $comment->user->name ?? 'Unknown' }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $comment->post->title ?? 'Unknown' }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $comment->comment ?? $comment->body ?? $comment->content }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $comment->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="px-6 py-8 text-center text-gray-500">
                                Belum ada komentar.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-admin-dashboard-layout>
