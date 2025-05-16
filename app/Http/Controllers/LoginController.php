<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

// Ajouter en haut du fichier
use Illuminate\Support\Facades\Config;

// Dans la méthode sendResetLink, avant d'appeler Password::broker()
Log::info('Configuration SMTP', [
    'host' => Config::get('mail.mailers.smtp.host'),
    'port' => Config::get('mail.mailers.smtp.port'),
    'encryption' => Config::get('mail.mailers.smtp.encryption'),
    'username' => Config::get('mail.mailers.smtp.username'),
    // Ne pas logger le mot de passe pour des raisons de sécurité
]);
class LoginController extends Controller
{
    public function show(){
        return view('login.show');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();        
            return redirect()->route('home')->with('success', 'Connexion réussie.');
        }
    
        // Retourner en arrière avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->except('password'));
    }

    public function logout (){
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success','Vous  êtes bien déconnecté');
    }


}
