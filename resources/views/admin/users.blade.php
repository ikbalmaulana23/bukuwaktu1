<x-admin-dashboard-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Audit User
        </h1>

        <p class="mt-1 text-gray-500">
            Daftar seluruh pengguna website.
        </p>
    </div>

    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl shadow-sm">

        <div class="px-6 py-4 border-b">
            <h2 class="font-semibold text-gray-800">
                Daftar User
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-600">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Nama
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Email
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Role
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-600">
                            Bergabung
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($users as $user)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-4">

                                <span class="px-2 py-1 text-xs font-medium rounded-full
                                    {{ $user->role === 'admin'
                                        ? 'bg-emerald-100 text-emerald-700'
                                        : 'bg-gray-100 text-gray-600' }}">
                                    {{ $user->role }}
                                </span>

                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="px-6 py-8 text-center text-gray-500">
                                Belum ada user.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-admin-dashboard-layout>
