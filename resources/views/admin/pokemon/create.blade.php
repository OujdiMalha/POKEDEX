@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Créer Pokemon</h1>

    <form action="{{ route('admin.pokemon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="pv" class="block text-gray-700">PV</label>
            <input type="number" name="pv" id="pv" value="{{ old('pv') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="poids" class="block text-gray-700">Poids</label>
            <input type="number" step="0.1" name="poids" id="poids" value="{{ old('poids') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="taille" class="block text-gray-700">Taille</label>
            <input type="number" step="0.01" name="taille" id="taille" value="{{ old('taille') }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="types" class="block text-gray-700">Types</label>
            <select name="types[]" id="types" class="mt-1 block w-full" multiple>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
        </div>
    </form>
@endsection
