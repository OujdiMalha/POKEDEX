@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter Type</h1>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur:</label>
            <input type="text" name="couleur" id="couleur" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
    </form>
</div>
@endsection
