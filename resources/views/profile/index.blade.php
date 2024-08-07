<x-layout>

    <div class="flex justify-center my-5">

        <div class="rounded-md border  basis-2/6 p-3">
            <h1 class="text-center font-semibold text-lg">Halaman Profile</h1>
            <div class="flex justify-center mt-4 ">
                <img src="img/profile.jpeg" class=" rounded-full" width="150px" alt="">
            </div>
            
            <p class="text-center mt-2"> {{ $user->name }}</p>
            <p class="italic text-center">{{ $user->bio }} </p>
           
            <div class="flex justify-around mx-20 mt-2 gap-2">
                <a href="/follower" class="bg-blue-700 px-2 "> follower <span></span></a>
                <a href="/following" class="bg-yellow-500 px-2"> following <span></span> </a>
           
                @if (auth()->user()->following->contains($user->id))
    <form action="{{ route('unfollow', $user) }}" method="POST">
        @csrf
        <button type="submit">Unfollow</button>
    </form>
@else
    <form action="{{ route('follow', $user) }}" method="POST">
        @csrf
        <button type="submit">Follow</button>
    </form>
@endif

            </div>
            
        </div>
    </div>

    <div class="flex justify-center gap-2">
   
<div class="rounded-md border  basis-4/6 p-3">
     
   
    <h2 class="text-center font-semibold text-lg my-3">Buku Favorit</h2>
    <div class="grid grid-cols-5 gap-2">
        @foreach($bukuFavorit as $buku)
        <div class="rounded-md border">
            <p class="font-semibold ">{{ Str::limit($buku->judul_buku, 10) }}</p>
            <div class="flex justify-center">
                <img src="img/buku1.png" width="100px" alt="">
            </div>
      
            <p class="text-sm text-center mt-3"> {{ $buku->penulis }}</p>
            <p class="flex justify-center">
                @for ($i = 0; $i < $buku->rating; $i++)
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                @endfor
            </p>

        </div>
        @endforeach
    </div>
    
    
</div>
<div class="rounded-md border  basis-2/6 p-3">
    <h1 class="text-center font-semibold text-lg">Halaman Profile</h1>
    <div class="flex justify-center mt-4 ">
        <img src="img/profile.jpeg" class=" rounded-full" width="150px" alt="">
    </div>
    
    <p class="text-center mt-2"> {{ $user->name }}</p>
    <p class="italic text-center">{{ $user->bio }} </p>
   
    
</div></div>
</x-layout>