@extends('layouts.app')

@section('content')
<div class="container">
    <h1>attaques</h1>
    <a href="{{ route('attaques.create') }}" class="btn btn-primary">Ajouter Attaque</a>
    <ul>
        @foreach ($attaques as $attaque)
            <li>
                <a href="{{ route('attaques.show', $attaque->id) }}">{{ $attaque->name }}</a>
                <a href="{{ route('attaques.edit', $attaque->id) }}">Edit</a>
                <form action="{{ route('attaques.destroy', $attaque->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
