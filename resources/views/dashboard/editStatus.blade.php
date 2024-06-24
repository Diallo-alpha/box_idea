<!-- resources/views/idees/editStatus.blade.php -->

@extends('layouts.base')

   <!-- Affichage des messages d'erreur -->
   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
@section('content')
<div class="container">
    <h1>Modifier le statut de l'idée</h1>

    <form action="{{ route('idees.updateStatus', $idee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="en attente" {{ $idee->status == 'en attente' ? 'selected' : '' }}>En cours</option>
                <option value="approuver" {{ $idee->status == 'approuver' ? 'selected' : '' }}>Accepté</option>
                <option value="rejeter" {{ $idee->status == 'rejeter' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
