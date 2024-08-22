<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row items-center md:items-start">
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

                <div class="md:w-1/3 flex justify-center">
                    <img class="w-64 h-96 rounded-lg shadow-lg object-cover"
                         src="{{ asset('storage/images/' . ($images[$pokemon->nom] ?? 'default.jpg')) }}"
                         alt="Pokemon Image">
                </div>
                <div class="md:w-2/3 md:ml-8 mt-4 md:mt-0">
                    <h2 class="text-3xl font-bold text-yellow-500 mb-4">{{ $pokemon->nom }}</h2>
                    <p class="text-gray-300 text-lg mb-2"><strong>PV:</strong> {{ $pokemon->pv }}</p>
                    <p class="text-gray-300 text-lg mb-2"><strong>Poids:</strong> {{ $pokemon->poids }} kg</p>
                    <p class="text-gray-300 text-lg mb-4"><strong>Taille:</strong> {{ $pokemon->taille }} m</p>
                    <div class="flex items-center mt-4">
                        <a href="{{ route('pokemon.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Retour à la page d'accueil</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg mt-8">
            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Commentaires</h2>
            <div class="flex-col space-y-4">
                @forelse ($pokemon->commentaires as $commentaire)
                    <div class="flex bg-gray-900 rounded-md shadow p-4 space-x-4">
                        <a href="{{ route('profile.show', $commentaire->user) }}" class="flex justify-start items-start h-full">
                            <x-avatar class="h-10 w-10" :user="$commentaire->user" />
                        </a>
                        <div class="flex flex-col justify-center w-full space-y-2">
                            <div class="flex justify-between items-center">
                                <a href="{{ route('profile.show', $commentaire->user) }}" class="text-black">
                                    <span class="font-bold">{{ $commentaire->user->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $commentaire->created_at->diffForHumans() }}</span>
                                </a>
                                @can('delete', $commentaire)
                                <form method="POST" action="{{ route('pokemon.commentaires.delete', [$pokemon, $commentaire]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Supprimer</button>
                                </form>
                                @endcan
                            </div>
                            <div class="text-black">
                                {{ $commentaire->body }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-900 rounded-md shadow p-4 text-black">
                        pas encore de commentaire :/
                    </div>
                @endforelse

                @auth
                <form action="{{ route('pokemon.commentaires.add', $pokemon) }}" method="POST" class="bg-gray-900 rounded-md shadow p-4 mt-4">
                    @csrf
                    <div class="flex justify-start items-start h-full mb-4">
                        <x-avatar class="h-10 w-10" :user="auth()->user()" />
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <textarea name="body" id="body" rows="4" placeholder="Votre commentaire" class="w-full rounded-md shadow-sm border-gray-300 bg-gray-100 text-black focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        <div class="mt-2 flex justify-end">
                            <button type="submit" class="font-bold bg-blue-500 text-white px-4 py-2 rounded shadow">Ajouter un commentaire</button>
                        </div>
                    </div>
                </form>
                @else
                <div class="bg-gray-900 rounded-md shadow p-4 text-black flex justify-between items-center mt-4">
                    <span> Vous devez être connecté pour ajouter un commentaire </span>
                    <a href="{{ route('login') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow-md">Se connecter</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</x-guest-layout>
