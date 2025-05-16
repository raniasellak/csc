<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index ()
    {
       return view('profile.index');
    }

    public function create(){
        return view('profile.create');
    }

    
    
    public function store(Request $request){ //request pour la recuperation de valeur car on'est dans l'inscription de donnee
       
        try{

        $prenom = $request->prenom;
        $nom = $request->nom;
        $nom_utilisateur = $request->nom_utilisateur;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $telephone = $request->telephone;
        $cellule_preferee = $request->cellule_preferee;
        $newsletter = $request->has('newsletter') ? 1 : 0;
        $conditions_acceptees = $request->has('conditions_acceptees') ? 1 : 0;

        //validation
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'nom_utilisateur' => 'required|string|max:255|unique:profiles,nom_utilisateur',
            'email' => 'required|string|email|max:255|unique:profiles',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:20',
            'cellule_preferee' => 'nullable|string|max:255',
            'conditions_acceptees' => 'required|accepted',
    
        ]);
        //Insertion
        Profile::create([
            'prenom' => $prenom,
            'nom' => $nom,
            'nom_utilisateur' =>$nom_utilisateur,
            'email' =>$email ,
            'password' => Hash::make($request->password),
            'password_confirmation' => $password_confirmation,
            'telephone' =>$telephone,
            'cellule_preferee'=>$cellule_preferee,
            'newsletter'=>$newsletter,
            'conditions_acceptees' => $conditions_acceptees,

        ]);
       //redirection
        return redirect()->route('home')->with('success', 'Inscription réussie.');
    }
    
    
    catch (ValidationException $e) {
    // Gestion des erreurs de validation
    return back()->withErrors($e->validator)->withInput();}

    catch (QueryException $e) {
        // Gestion des erreurs de base de données
        $errorCode = $e->errorInfo[1];
        
        // Erreur de duplication (code MySQL 1062)
        if ($errorCode == 1062) {
            if (str_contains($e->getMessage(), 'email')) {
                return back()->withErrors(['email' => 'Cette adresse email est déjà utilisée.'])->withInput();
            }
            if (str_contains($e->getMessage(), 'nom_utilisateur')) {
                return back()->withErrors(['nom_utilisateur' => 'Ce nom d\'utilisateur est déjà utilisé.'])->withInput();
            }
            // Message générique si on ne peut pas déterminer le champ exact
            return back()->withErrors(['general' => 'Une information fournie est déjà utilisée par un autre compte.'])->withInput();
        }
        
        // Autres erreurs de base de données
        return back()->withErrors(['general' => 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.'])->withInput();
        
    } catch (\Exception $e) {
        // Toutes les autres erreurs
        return back()->withErrors(['general' => 'Une erreur inattendue est survenue. Veuillez réessayer.'])->withInput();
    }
}


}
