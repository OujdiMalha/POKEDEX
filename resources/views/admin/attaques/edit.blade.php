@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Modifier Attaque</h1>

    <form action="{{ route('admin.attaques.update', $attaque->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $attaque->nom }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="degats" class="block text-gray-700">Dégâts</label>
            <input type="number" name="degats" id="degats" value="{{ $attaque->degats }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <input type="text" name="description" id="description" value="{{ $attaque->description }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="type_id" class="block text-gray-700">Type</label>
            <select name="type_id" id="type_id" class="mt-1 block w-full">
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $attaque->type_id == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </div>
    </form>
@endsection
