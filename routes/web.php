<?php
// routes/web.php
/*
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\FormationController;
use App\Http\Controllers\CelluleController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ContactController;
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
|
| Voici où vous pouvez enregistrer les routes web pour votre application.
| Ces routes sont chargées par le RouteServiceProvider et toutes sont
| assignées au groupe "web".
|
*/

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profiles',[ProfileController::class,'index'])->name('profiles.index');


Route::get('/profiles/create',[ProfileController::class,'create'])->name('create');
/*
// Routes pour les formations
Route::prefix('formations')->group(function () {
    Route::get('/', [FormationController::class, 'index'])->name('formations.index');
    Route::get('/{formation}', [FormationController::class, 'show'])->name('formations.show');
});


// Routes pour les cellules
Route::prefix('cellules')->group(function () {
    Route::get('/', [CelluleController::class, 'index'])->name('cellules.index');
    Route::get('/{cellule}', [CelluleController::class, 'show'])->name('cellules.show');
});

// Routes pour la boutique
Route::prefix('boutique')->group(function () {
    Route::get('/', [BoutiqueController::class, 'index'])->name('boutique.index');
    Route::get('/{produit}', [BoutiqueController::class, 'show'])->name('boutique.show');
});

// Route pour la page de contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes d'authentification
Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Inscription
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    // Mot de passe oublié
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
});

// Routes protégées (nécessitent authentification)
Route::middleware('auth')->group(function () {
    // Déconnexion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
});*/