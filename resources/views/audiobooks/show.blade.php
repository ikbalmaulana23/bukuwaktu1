<x-layout>

    <div class="flex justify-between gap-3">
        <div class="p-4 border rounded basis-1/3">
            <h2 class="text-xl font-bold mb-2">{{ $audiobook->title }}</h2>
            <p class="text-gray-600 mb-4">Oleh: {{ $audiobook->speaker->name }}</p>
            @if ($audiobook->cover)
                <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="size-96 mb-4">
            @endif

            <audio controls class="w-full mt-2" id="myAudio">
                <source src="{{ asset('storage/' . $audiobook->file_path) }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

        </div>
        <div class="p-4 border basis-2/3">
            <p>{{ $audiobook->description }}</p>
        </div>

     </div>




     <div class="basis-2/3 py-5">
         <p>Others Audiobook</p>
         <div class="">
             @foreach ($recomendation as $audiobook)
             <a href="{{ route('audiobooks.show', $audiobook->id) }}" class="p-4 rounded-sm shadow-sm border flex my-2 hover:bg-slate-100">
                 @if ($audiobook->cover)
                     <img src="{{ asset('storage/' . $audiobook->cover) }}" alt="Cover of {{ $audiobook->title }}" class="h-20 mb-4 rounded-md">
                 @endif
                 <div class="px-3">
                     <h2 class="font-bold mb-2">{{ $audiobook->title }}</h2>
                     <p class="text-sm text-gray-600">Speaker: {{ $audiobook->speaker->name }}</p>
                 </div>
             </a>
             @endforeach
         </div>
     </div>

 </div>


 </x-layout>
