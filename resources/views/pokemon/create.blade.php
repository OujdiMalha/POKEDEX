@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter Pokemon</h1>
    <form action="{{ route('pokemon.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pv">PV:</label>
            <input type="number" name="pv" id="pv" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="poids">Poids:</label>
            <input type="number" step="0.01" name="poids" id="poids" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="taille">Taille:</label>
            <input type="number" step="0.01" name="taille" id="taille" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
    </form>
</div>
@endsection
