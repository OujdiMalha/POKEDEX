@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter un Type</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="couleur" class="block text-gray-700">Couleur</label>
            <input type="text" name="couleur" id="couleur" class="mt-1 block w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </div>
    </form>
@endsection
