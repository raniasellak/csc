<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('password.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Code de débogage amélioré
        $userInDB = DB::table('users')->where('email', $request->email)->first();
        $profileInDB = DB::table('profiles')->where('email', $request->email)->first();
        
        Log::info('Recherche utilisateur pour réinitialisation', [
            'email' => $request->email,
            'trouvé_dans_users' => $userInDB ? 'oui' : 'non',
            'trouvé_dans_profiles' => $profileInDB ? 'oui' : 'non'
        ]);

        // Utiliser le broker 'profiles' au lieu du broker par défaut 'users'
        $status = Password::broker('profiles')->sendResetLink(
            $request->only('email')
        );

        Log::info('Résultat de sendResetLink', [
            'email' => $request->email,
            'status' => $status,
            'status_text' => __($status)
        ]);

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request)
    {
        return view('password.reset', ['token' => $request->token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Utiliser le broker 'profiles' au lieu du broker par défaut 'users'
        $status = Password::broker('profiles')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login.show')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
}
