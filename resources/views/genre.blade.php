
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <h1 class="text-lg font-semibold py-3">Hellow, You can choose the genre you like 😼</h1>
    
    <div class="grid grid-cols-5 gap-3">
        @foreach ($category as $item)
        @php
            $randomImage = $images[array_rand($images)];
        @endphp
        <a href="/posts?category={{ $item->slug }}">
            <div class="relative overflow-hidden group">
                <img src="{{ asset('img/' . $randomImage) }}" alt="" class="h-60 rounded-md ">
                <p class="absolute top-1/2 left-24 transform -translate-x-1/2 -translate-y-1/2 font-bold text-green-600 bg-white text-2xl  duration-300 ease-in-out shadow-md text-center px-2 group-hover:"> <span>{{ $item->name }}</span></p>
            </div>
        </a>
        @endforeach
    </div>
    
    
    
    
   
   
    
    

</x-layout>