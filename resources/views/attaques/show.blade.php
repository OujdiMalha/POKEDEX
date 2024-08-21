@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $attaque->nom }}</h1>
    <p><strong>degats:</strong> {{ $attaque->degats }}</p>
    <p><strong>Description:</strong> {{ $attaque->description }}</p>
    <p><strong>Type:</strong> {{ $attaque->type->nom }}</p>
    @if ($attaque->image)
        <p><img src="{{ asset('storage/' . $attaque->image) }}" alt="{{ $attaque->nom }}"></p>
    @endif

    <a href="{{ route('attaques.index') }}" class="btn btn-primary">Retourner à la liste</a>
    <a href="{{ route('attaques.edit', $attaque->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('attaques.destroy', $attaque->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
