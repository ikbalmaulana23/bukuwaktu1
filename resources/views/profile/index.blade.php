<x-layout>
    @if (session('success'))
    <div class="text-green-500 text-center mt-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="text-red-500 text-center mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



    <div class="flex justify-center mb-5">

        
        <div class="rounded-md border basis-2/6 p-3 relative">
            <h1 class="text-center font-semibold text-lg">Halaman Profile</h1>
            
            <div class="flex justify-center mt-4 relative">
                <img src="{{ $user->profile_photo ? asset('storage/profile_photos/' . $user->profile_photo) : asset('img/profile.jpeg') }}" class="rounded-full" width="150px" alt="Profile Photo">
                
                <!-- Tombol untuk membuka modal -->
                <button id="openModal" class="absolute top-0 right-1/4 bg-white text-black p-1 rounded-full shadow-md">
                    <i class="fas fa-edit m-1"></i>
                </button>
            </div>
            
            <p class="text-center mt-2">{{ $user->name }}</p>
            <p class="italic text-center">{{ $user->bio }}</p>
           
            <div class="flex justify-around mx-20 mt-2 gap-2">
                <a href="/follower" class="bg-blue-700 px-2">follower <span></span></a>
                <a href="/following" class="bg-yellow-500 px-2">following <span></span></a>
        
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
        
        <!-- Modal -->
        <div id="profileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-5 rounded-lg shadow-lg w-96">
                <h2 class="text-center font-semibold text-lg mb-4">Edit Profile</h2>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="mb-4">
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full">
                    </div>
        
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
        
                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $user->bio }}</textarea>
                    </div>
        
                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        
        
    </div>
    <div class="flex justify-center gap-2">

        <div class="rounded-md border basis-4/6 p-3">
            <h2 class="text-center font-semibold text-lg my-3">Rangkuman yang ingin di post</h2>
            <div class="grid grid-cols-2 gap-2">
                @if($posts->isEmpty())
                <p>You have no posts.</p>
            @else
                @foreach($posts as $post)
                    <div class="bg-white shadow-md rounded p-4 mb-4">
                        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                        <p>{!! $post->body !!}</p>
                        <small class="text-gray-500">Posted on {{ $post->created_at->format('d M Y') }}</small>
                    </div>
                @endforeach
            @endif
        
            </div>
        </div>
    
        <div class="rounded-md border basis-3/6 p-3">
            <h1 class="text-center font-semibold text-lg">Audiobook yang dipost</h1>
            
            <div class="space-y-4">
                @if($audiobooks)
                    @foreach($audiobooks as $audiobook)
                        <div class="p-4 border rounded">
                            <h2 class="text-xl font-bold">{{ $audiobook->title }}</h2>
                            <p class="text-gray-600">Oleh: {{ $audiobook->speaker->name ?? 'Unknown' }}</p>
                           
                            <p>{{ $audiobook->description }}</p>
                           
                        </div>
                    @endforeach
                @else
                    <p>No audiobooks found.</p>
                @endif
            </div>
        </div>
    
    </div>
</x-layout>