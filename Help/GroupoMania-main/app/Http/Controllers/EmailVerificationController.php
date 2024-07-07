<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    //

    public function registerEmailVerify(Request $request, $token)
    {
        $user = User::where('email_verified_token', $token)->firstOrFail();

        if ($user) {
            $user->email_verified_at = now();
            $user->email_verified_token = null;
            $user->save();

            // Rediriger vers la page de connexion ou afficher un message de succès

            return redirect()->intended(route('auth.login'));;

        } else {
            // Rediriger avec un message d'erreur ou afficher une vue d'erreur
            abort(404, 'Une ou plusieurs eurreur se sont produites ... Vaillez resaiyer');


        }
    }
    public function resetingEmailverify(Request $request, $token)
    {
        $user = User::where('email_verified_token', $token)->firstOrFail();

        if ($user) {
            // $user->email_verified_at = now();
            $user->email_verified_token = null;
            $user->save();

            // Rediriger vers la page de connexion ou afficher un message de succès

            return view('auth.confirm', compact('user'));

        } else {
            // Rediriger avec un message d'erreur ou afficher une vue d'erreur
            abort(404, 'Une ou plusieurs eurreur se sont produites ... Vaillez resaiyer');


        }
    }
    
}
