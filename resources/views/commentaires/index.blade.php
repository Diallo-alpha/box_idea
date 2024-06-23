<!-- resources/views/commentaires/index.blade.php -->

@extends('layouts.commentaires')

@section('content')
    <div class="container">
        <h1>Liste des Commentaires</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->has('contenu'))
            <div class="alert alert-danger">
                {{ $errors->first('contenu') }}
            </div>
        @endif

        @foreach ($commentaires as $commentaire)
            <div class="panel panel-default mb-3">
                <div class="panel-body">
                    <h4>{{ $commentaire->user->name }}</h4>
                    <p>{{ $commentaire->contenu }}</p>
                    <p>Publié le {{ $commentaire->created_at->format('d/m/Y H:i') }}</p>

                    <!-- Options de modification et de suppression -->
                    <div class="d-flex justify-content-end">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-primary btn-sm mr-2">Modifier</a>

                        <!-- Bouton Supprimer -->
                        <form action="{{ route('commentaires.destroy', $commentaire->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
