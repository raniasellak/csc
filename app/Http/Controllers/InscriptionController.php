<?php
namespace App\Http\Controllers;

use App\Models\Inscription;
use Carbon\Carbon;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function quickRegister($formationId)
    {
        $formation = Formation::findOrFail($formationId);

        if (Carbon::parse($formation->date)->isPast()) {
            return redirect()->route('formations.index')->with('error', 'La formation est déjà passée.');
        }

        $profile = Auth::user();

        if (Inscription::where('formation_id', $formationId)->where('profile_id', $profile->id)->exists()) {
            return redirect()->route('formations.index')->with('error', 'Vous êtes déjà inscrit.');
        }

        Inscription::create([
            'formation_id' => $formationId,
            'profile_id' => $profile->id,
            'nom' => $profile->nom_complet,  // ou $profile->prenom . ' ' . $profile->nom
            'email' => $profile->email,
        ]);

        return redirect()->route('formations.index')->with('success', 'Inscription réussie.');
    }
}
