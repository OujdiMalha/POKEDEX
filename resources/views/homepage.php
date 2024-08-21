@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-instagramPurple via-instagramRed to-instagramOrange mb-8 text-center">
        POKEDEXIA
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($pokemon as $pokemon)
            <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h2 class="text-2xl font-bold text-gray-800">{{ $pokemon->nom }}</h2>
                <p class="text-gray-600">PV: {{ $pokemon->pv }}</p>
                <p class="text-gray-600">POIDS: {{ $pokemon->poids }} kg</p>
                <p class="text-gray-600">TAILLE: {{ $pokemon->taille }} m</p>
                <a href="{{ route('pokemon.show', $pokemon->id) }}" class="inline-block mt-4 text-instagramRed hover:text-instagramOrange font-semibold hover:underline">
                    Voir les détails
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

