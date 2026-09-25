<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Pribadi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Data Pribadi
                </h1>

                <p class="text-gray-500 mt-1">
                    Lengkapi data pribadi kamu.
                </p>

                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form
                    action="{{ route('personal-data.update') }}"
                    method="POST"
                    class="mt-8 space-y-5"
                >

                    @csrf
                    @method('PUT')

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name', $data?->full_name) }}"
                            class="mt-2 w-full rounded-lg border-gray-300"
                            placeholder="Masukkan nama lengkap"
                        >

                        @error('full_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nomor HP --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $data?->phone) }}"
                            class="mt-2 w-full rounded-lg border-gray-300"
                            placeholder="08xxxxxxxxxx"
                        >
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Alamat
                        </label>

                        <textarea
                            name="address"
                            rows="3"
                            class="mt-2 w-full rounded-lg border-gray-300"
                            placeholder="Masukkan alamat"
                        >{{ old('address', $data?->address) }}</textarea>
                    </div>

                    {{-- Kota --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Kota
                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city', $data?->city) }}"
                            class="mt-2 w-full rounded-lg border-gray-300"
                            placeholder="Masukkan kota"
                        >
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="birth_date"
                            value="{{ old('birth_date', $data?->birth_date) }}"
                            class="mt-2 w-full rounded-lg border-gray-300"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-sky-600 hover:bg-sky-700 text-white py-3 rounded-lg font-semibold"
                    >
                        Simpan Data
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
