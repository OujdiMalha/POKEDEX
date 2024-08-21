@extends('layouts.app')

@section('content')
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Attaques</h1>

    <div class="mt-4">
        <form action="{{ route('admin.attaques.index') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Rechercher une Attaque"
                    class="flex-grow border border-gray-300 rounded shadow px-4 py-2 mr-4"
                    value="{{ request()->search }}"
                    autofocus
                />
                <button
                    type="submit"
                    class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow"
                >
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.attaques.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Ajouter une Attaque
            </a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attaques as $attaque)
                    <tr>
                        <td class="border px-4 py-2">{{ $attaque->nom }}</td>
                        <td class="border px-4 py-2">{{ $attaque->description }}</td>
                        <td class="border px-4 py-2">{{ optional($attaque->type)->nom ?? 'N/A' }}</td> <!-- Modifié ici -->
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.attaques.edit', $attaque) }}" class="text-blue-500">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.attaques.destroy', $attaque) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $attaques->links() }}
        </div>
    </div>
@endsection
