<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Requests\CommentaireValidation;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        return view('commentaires.create');
    }

    public function store(CommentaireValidation $request)
    {
        Commentaire::create($request->validated());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire créé avec succès');
    }

    public function show(Commentaire $commentaire)
    {
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(CommentaireValidation $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validated());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire mis à jour avec succès');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé avec succès');
    }
}
