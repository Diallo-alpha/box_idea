<!-- resources/views/idees/show.blade.php -->

@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Détails de l'idée</h1>

    <div class="panel panel-default">
        <div class="panel-body">
            <h2>{{ $idee->titre }}</h2>
            <p>{{ $idee->description }}</p>
            <p><strong>Statut:</strong> {{ $idee->status }}</p>
            <p><strong>Proposé par:</strong> {{ $idee->user->name }}</p>
            <p><strong>Catégorie:</strong> {{ $idee->categorie->nom }}</p>
        </div>
    </div>

    <h2>Commentaires</h2>
    @if ($idee->commentaires->count() > 0)
        @foreach ($idee->commentaires as $commentaire)
            <div class="panel panel-default">
                <div class="panel-body">
                    <p><strong>{{ $commentaire->user->name }}</strong></p>
                    <p>{{ $commentaire->contenu }}</p>
                    <p>Publié le {{ $commentaire->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun commentaire pour cette idée.</p>
    @endif

    <!-- Formulaire pour ajouter un commentaire -->
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('commentaires.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="contenu">Votre commentaire</label>
                    <textarea name="contenu" id="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="3" required>{{ old('contenu') }}</textarea>
                    @error('contenu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="idee_id" value="{{ $idee->id }}">
                @error('idee_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Commenter</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <a href="{{ route('idees.index') }}" class="btn btn-primary">Retour à la liste des idées</a>
</div>
@endsection
