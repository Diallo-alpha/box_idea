<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Http\Requests\IdeeValidation;
use App\Models\Categorie;
use Illuminate\Http\Request;

class IdeeController extends Controller
{
    public function index()
    {
        $idees = Idee::all();
        return view('idees.index', compact('idees'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    public function store(IdeeValidation $request)
    {
        $data = $request->validated();
        $data['status'] = 'en attente';  // Définir le statut par défaut

        Idee::create($data);

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès');
    }


    public function show(Idee $idee)
    {
        return view('idees.show', compact('idee'));
    }

    public function edit(Idee $idee)
    {
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    public function update(IdeeValidation $request, Idee $idee)
    {
        $idee->update($request->validated());

        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès');
    }

    public function destroy(Idee $idee)
    {
        $idee->delete();

        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès');
    }
}
