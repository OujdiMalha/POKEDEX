@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $type->nom }}</h1>
    <p><strong>Couleur:</strong> {{ $type->couleur }}</p>
    @if ($type->image)
        <p><img src="{{ asset('storage/' . $type->image) }}" alt="{{ $type->nom }}"></p>
    @endif

    <a href="{{ route('types.index') }}" class="btn btn-primary">Retour à la liste</a>
    <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
