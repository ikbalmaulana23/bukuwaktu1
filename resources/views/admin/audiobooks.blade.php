<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Audit Audiobook
        </h1>

        <p class="mt-1 text-gray-500">
            Kelola dan pantau audiobook yang tersedia.
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
                            Speaker
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Tanggal
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($audiobooks as $audiobook)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $audiobook->title }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $audiobook->speaker }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $audiobook->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4"
                                class="px-6 py-8 text-center text-gray-500">
                                Belum ada audiobook.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-admin-dashboard-layout>
