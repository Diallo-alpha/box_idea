<?php
namespace App\Http\Controllers;

use App\Models\Idee;
use Illuminate\Http\Request;
use App\Notifications\IdeeStatusChanger;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        $idees = Idee::with('user', 'categorie')->get();
        return view('dashboard.admin', compact('idees'));
    }

    public function editStatus(Idee $idee)
    {
        return view('dashboard.editStatus', compact('idee'));
    }

    public function updateStatus(Request $request, Idee $idee)
    {
        $request->validate([
            'status' => 'required|in:en attente,approuver,rejeter'
        ]);

        $idee->status = $request->input('status');
        $idee->save();

        // Envoyer un email à l'utilisateur
        $user = $idee->user;
        Notification::send($user, new IdeeStatusChanger($idee));

        return redirect()->route('admin.index')->with('success', 'Statut mis à jour avec succès');
    }
}
