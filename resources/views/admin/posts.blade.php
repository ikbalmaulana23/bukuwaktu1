<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Audit Postingan
        </h1>

        <p class="mt-1 text-gray-500">
            Pantau seluruh postingan yang dibuat pengguna.
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
                            Judul
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Author
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Tanggal
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($posts as $post)

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

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4"
                                class="px-6 py-8 text-center text-gray-500">
                                Belum ada postingan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-admin-dashboard-layout>
