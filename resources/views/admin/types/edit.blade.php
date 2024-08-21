@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Modifier Type</h1>

    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $type->nom }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="couleur" class="block text-gray-700">Couleur</label>
            <input type="text" name="couleur" id="couleur" value="{{ $type->couleur }}" class="mt-1 block w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </div>
    </form>
@endsection
