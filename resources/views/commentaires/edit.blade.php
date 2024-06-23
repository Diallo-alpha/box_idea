@extends('layouts.commentaires')

@section('content')
    <div class="container">
        <h1>Modifier le Commentaire</h1>

        <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="contenu">Contenu du Commentaire</label>
                <textarea name="contenu" id="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="5" required>{{ old('contenu', $commentaire->contenu) }}</textarea>
                @error('contenu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="idee_id" value="{{ $commentaire->idee_id }}">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
