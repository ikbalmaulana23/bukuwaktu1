<x-layout>

    <div class="flex justify-center">
    <div class="rounded-md border  basis-1/2 p-3">
        <h1 class="text-center font-semibold text-lg">Halaman Profile</h1>
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <h2 class="text-center font-semibold text-lg mt-5">Buku Favorit</h2>
        <ul>
            @foreach($bukuFavorit as $buku)
                <li>
                    <p><strong>Judul Buku:</strong> {{ $buku->judul_buku }}</p>
                    <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                    <p><strong>Rating:</strong> {{ $buku->rating }}</p>
                </li>
            @endforeach
        </ul>
</div>
</x-layout>