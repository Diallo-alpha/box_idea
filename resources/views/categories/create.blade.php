@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Créer une nouvelle catégorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de la catégorie</label>
            <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
