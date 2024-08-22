<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-yellow-500 mb-4">WELCOME TO POKEDEXIA</h1>
            <p class="text-gray-300 text-lg mb-8">
                Parcourez notre sélection de Pokémon et explorez leurs spécificités fascinantes. Sélectionnez un Pokémon pour découvrir davantage d'informations.
            </p>

            <!-- Formulaire de recherche -->
            <form action="{{ route('homepage') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <input
                        type="text"
                        name="search"
                        id="search"
                        placeholder="Rechercher un Pokémon"
                        class="flex-grow border border-gray-300 rounded shadow px-4 py-2 mr-4 bg-black text-white"
                        value="{{ request()->search }}"
                        autofocus
                    />
                    <button
                        type="submit"
                        class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow"
                    >
                        <x-heroicon-o-magnifying-glass class="h-5 w-5" />
                    </button>
                </div>
            </form>

            @php
                $images = [
                    'Pikachu' => 'pokemon1.jpg',
                    'Rondoudou' => 'pokemon2.jpg',
                    'Salamèche' => 'pokemon3.jpg',
                    'Miaouss' => 'pokemon4.jpg',
                    'Bulbizarre' => 'pokemon5.jpg',
                    'Carapuce' => 'pokemon6.jpg',
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($pokemon as $poke)
                <div class="bg-gray-900 rounded-lg shadow-lg overflow-hidden">
                    <div class="flex justify-center">
                        <img
                            class="w-64 h-96 rounded-lg shadow-lg object-cover"
                            src="{{ asset('storage/images/' . ($images[$poke->nom] ?? 'default.jpg')) }}"
                            alt="{{ $poke->nom }}"
                        >
                    </div>
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-yellow-500">{{ $poke->nom }}</h2>
                        <p class="text-gray-300 text-sm"><strong>PV:</strong> {{ $poke->pv }}</p>
                        <p class="text-gray-300 text-sm"><strong>Poids:</strong> {{ $poke->poids }} kg</p>
                        <p class="text-gray-300 text-sm"><strong>Taille:</strong> {{ $poke->taille }} m</p>
                        <p class="text-gray-300 text-sm"><strong>Type:</strong>
                            @foreach ($poke->types as $type)
                                <span class="bg-gray-700 text-gray-300 px-2 py-1 rounded">{{ $type->name }}</span>
                            @endforeach
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('pokemon.show', $poke->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Détaille..</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $pokemon->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>
