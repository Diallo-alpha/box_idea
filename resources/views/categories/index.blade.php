@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->nom }}</td>
                    <td>
                        <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
