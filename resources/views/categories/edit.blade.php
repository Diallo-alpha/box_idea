@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom de la catégorie</label>
            <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $categorie->nom) }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
