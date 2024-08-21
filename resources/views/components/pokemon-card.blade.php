<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
    href="{{ route('pokemon.show', $pokemon) }}">
     <img src="{{ asset('storage/' . $pokemon->image) }}" alt="image du pokemon" />
     <div class="uppercase font-bold text-gray-800">{{ $pokemon->name }}</div>
     <div class="flex-grow text-gray-700 text-sm text-justify">
         PV: {{ $pokemon->pv }}
     </div>
     <div class="flex justify-between items-center">
         <div class="text-sm text-gray-500">
             Poids: {{ $pokemon->poids }} kg
         </div>
         <div class="flex items-center space-x-2">
             <x-heroicon-o-chat-bubble-bottom-center-text class="h-5 w-5 text-gray-500" />
             <div class="text-sm text-gray-500">{{ $pokemon->commentaires_count }}</div>
         </div>
     </div>
 </a>
</div>
