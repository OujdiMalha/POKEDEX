@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Modifier Pokemon</h1>

    <form action="{{ route('admin.pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nom" class="block text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $pokemon->nom }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="pv" class="block text-gray-700">PV</label>
            <input type="number" name="pv" id="pv" value="{{ $pokemon->pv }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="poids" class="block text-gray-700">Poids</label>
            <input type="number" step="0.1" name="poids" id="poids" value="{{ $pokemon->poids }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="taille" class="block text-gray-700">Taille</label>
            <input type="number" step="0.01" name="taille" id="taille" value="{{ $pokemon->taille }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
            @if ($pokemon->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $pokemon->image) }}" alt="pokemon Image" class="h-32 w-32 object-cover">
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="types" class="block text-gray-700">Types</label>
            <select name="types[]" id="types" multiple class="mt-1 block w-full">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ in_array($type->id, $pokemon->types->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </div>
    </form>
@endsection
