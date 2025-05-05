<?php
<?php
// app/Http/Controllers/Auth/AuthController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     * 
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Si l'utilisateur est déjà connecté, le rediriger vers l'accueil
        if (Auth::check()) {
            return redirect()->route('accueil');
        }
        
        return view('auth.login');
    }

    /**
     * Traite la demande de connexion
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'Veuillez entrer une adresse e-mail valide',
            'password.required' => 'Le mot de passe est obligatoire',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Tentative de connexion
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Réinitialiser la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();

            // Redirection vers la page précédente ou le tableau de bord
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Connexion réussie');
        }

        // Échec de l'authentification
        return redirect()->back()
            ->withInput($request->except('password'))
            ->withErrors([
                'email' => 'Ces identifiants ne correspondent pas à nos enregistrements',
            ]);
    }

    /**
     * Affiche le formulaire d'inscription
     * 
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        // Si l'utilisateur est déjà connecté, le rediriger vers l'accueil
        if (Auth::check()) {
            return redirect()->route('accueil');
        }
        
        return view('auth.register');
    }

    /**
     * Traite la demande d'inscription
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'Veuillez entrer une adresse e-mail valide',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'password.confirmed' => 'Les mots de passe ne correspondent pas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique après inscription
        Auth::login($user);

        // Redirection vers le tableau de bord avec message de succès
        return redirect()->route('dashboard')
            ->with('success', 'Votre compte a été créé avec succès');
    }

    /**
     * Déconnexion de l'utilisateur
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalider la session et régénérer le jeton CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection vers l'accueil avec message
        return redirect()->route('accueil')
            ->with('success', 'Vous avez été déconnecté avec succès');
    }

    /**
     * Affiche le formulaire pour réinitialiser le mot de passe
     * 
     * @return \Illuminate\View\View
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Traite la demande de réinitialisation de mot de passe
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Cette méthode devrait envoyer un e-mail de réinitialisation du mot de passe
        // Pour un système complet, utilisez le système de réinitialisation de Laravel
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'Veuillez entrer une adresse e-mail valide',
            'email.exists' => 'Cette adresse e-mail n\'est pas enregistrée dans notre système',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ici, vous implémenteriez l'envoi du lien de réinitialisation
        // Pour cet exemple, nous redirigeons simplement avec un message

        return redirect()->route('login')
            ->with('success', 'Si cette adresse e-mail existe dans notre système, vous recevrez un lien de réinitialisation.');
    }
}