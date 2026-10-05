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

                    {{-- Genre yang Disukai --}}
                    {{-- Genre yang Disukai --}}
<div>
    <label class="block font-medium text-gray-700">
        Genre yang Disukai
    </label>

    <p class="text-sm text-gray-500 mt-1 mb-3">
        Pilih genre buku yang kamu sukai.
    </p>

   @php
    $genres = [
        'Romance',
        'Fantasy',
        'Mystery',
        'Thriller',
        'Horror',
        'Action',
        'Adventure',
        'Sci-Fi',
        'Drama',
        'Comedy',
        'Historical',
        'Biography',
        'Psychology',
        'Self-Improvement',
        'Business',
        'Education',
        'Religion',
        'Poetry',
        'Children',
        'Young Adult',
    ];

    $selectedGenres = old('genre');

    if ($selectedGenres === null) {
        $selectedGenres = $data?->genre
            ? explode(', ', $data->genre)
            : [];
    }
@endphp

    <div class="flex flex-wrap gap-2 mt-3">
        @foreach ($genres as $genre)
            <label class="cursor-pointer">
                <input
                    type="checkbox"
                    name="genre[]"
                    value="{{ $genre }}"
                    class="peer hidden"
                    {{ in_array($genre, $selectedGenres) ? 'checked' : '' }}
                >

                <span
                    class="inline-block px-4 py-2 rounded-full border border-gray-300
                           text-gray-600 bg-white
                           peer-checked:bg-sky-600
                           peer-checked:text-white
                           peer-checked:border-sky-600
                           hover:border-sky-400
                           hover:text-sky-600
                           transition-all duration-200"
                >
                    {{ $genre }}
                </span>
            </label>
        @endforeach
    </div>

    @error('genre')
        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>
    @enderror
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

                        @error('birth_date')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Kelamin --}}
                    <div>
                        <label class="block font-medium text-gray-700">
                            Kelamin
                        </label>

                        <select
                            name="gender"
                            class="mt-2 w-full rounded-lg border-gray-300"
                        >
                            <option value="">Pilih kelamin</option>

                            <option
                                value="Laki-laki"
                                {{ old('gender', $data?->gender) == 'Laki-laki' ? 'selected' : '' }}
                            >
                                Laki-laki
                            </option>

                            <option
                                value="Perempuan"
                                {{ old('gender', $data?->gender) == 'Perempuan' ? 'selected' : '' }}
                            >
                                Perempuan
                            </option>
                        </select>

                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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

                        @error('city')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
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
