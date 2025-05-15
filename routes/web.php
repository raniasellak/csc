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
use App\Http\Controllers\LoginController;
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

Route::post('/profiles/store',[ProfileController::class,'store'])->name('store');



Route::get('/login',[LoginController::class,'show'])->name('login.show');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');


// Routes pour mot de passe oublié
Route::get('/password/forgot', [App\Http\Controllers\ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\ForgotPasswordController::class, 'resetPassword'])->name('password.update');





