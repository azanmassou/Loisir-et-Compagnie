<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetEmailRequest;
use App\Http\Requests\ConfirmEmailRequest;
use App\Notifications\EmailResetingNotification;
use Illuminate\Support\Str;
use App\Mail\VerificationRegisterAdminEmail;
use App\Mail\VerificationRegisterEmail;
use App\Mail\VerificationResetPasswordEmail;
use App\Models\User;
use App\Notifications\RegisterEmailNotification;
// use App\Notifications\EmailResetingNotification;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    //

    public function doConfirm(ConfirmEmailRequest $request)
    {
        
        $credentials = $request->validated();

         if ($credentials['password'] !== $credentials['passwords']) {

            return to_route('auth.register')->withErrors([
                'password' => 'Les Champs ne sont identiques',
                'passwords' => 'Les Champs ne sont identiques'
            ])->withInput(['email', 'name', 'remember']);
        }

        $user = User::where('email', $credentials['userEmail'])->first();

       

        if (Hash::check($credentials['password'], $user->password)) {
            // The passwords match...

            $user->password = $credentials['password'];

            $user->save();
        }

      

        // dd($user);

        // $reset_token = Str::random(60); // Générer un token

        // Mail::to($request->input('email'))->send(new VerificationResetPasswordEmail($reset_token));

        // $admin = User::where('role_id', 1)->get();

        // $user = User::where('email', $request->input('email'))->first();

        // $userId = $user->id;

        // Récupérer l'utilisateur
        // $user = User::find($userId);

        // dd($user);

        // if ($admin) {

        //     Notification::send($admin, new EmailResetingNotification($user, $reset_token));
        // }


        // Mail::to($request->input('email'))->send(new OrderShipped($request->validated()));

        return view('auth.success');
    }
    public function confirm()
    {

        return view('auth.confirm');
    }
    public function doReset(ResetEmailRequest $request)
    {

        $user = User::where('email', $request->input('email'))->first();

        if($user){

            $reset_token = Str::random(60); // Générer un token

            $user->email_verified_token = $reset_token;

            $user->save();

            Mail::to($request->input('email'))->send(new VerificationResetPasswordEmail($reset_token));

            $admin = User::where('role_id', 1)->get();

            if ($admin) {

                Notification::send($admin, new EmailResetingNotification($user, $reset_token));
            }

           

            return view('auth.isMailling');
        }

        // dd($user);

        // Mail::to($request->input('email'))->send(new VerificationResetPasswordEmail($reset_token));

        // $userId = $user->id;

        // Récupérer l'utilisateur
        // $user = User::find($userId);

        // dd($user);

        // Mail::to($request->input('email'))->send(new OrderShipped($request->validated()));

        return to_route('auth.reset')->withErrors([
            // 'name' => 'Un ou plusieurs champs sont incorrect ... ',
            // 'email' => 'Un ou plusieurs champs sont incorrect ... ',
            'password' => 'Un ou plusieurs champs sont incorrect ... ',
            'passwords' => 'Un ou plusieurs champs sont incorrect ... '
        ])->withInput(['password', 'passwords']);
    }
    public function reset()
    {

        return view('auth.reset');
    }
    public function login()
    {

        return view('auth.login');
    }
    public function register()
    {

        return view('auth.register');
    }
    public function logout()
    {
        Auth::logout();

        // Supprimer le cookie "Remember Me"
        return to_route('auth.login')->withCookie(\Illuminate\Support\Facades\Cookie::forget('email'));
    }
    public function doLogin(LoginRequest $request)
    {

        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if ($user AND $user->email_verified_at == null ) {

            // dd($user->email_verified_at);
            return to_route('auth.login')->withErrors([
                'email' => 'Cette adresse email n\'est pas encore valider ..',
                // 'password' => 'Un ou plusieurs champs sont incorrect ... '
            ])->withInput(['email']);
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role->name === 'admin') {

                return redirect()->intended(route('dashbord'));
            }
            return redirect()->intended(route('posts.dashbord'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Un ou plusieurs champs sont incorrect ... ',
            'password' => 'Un ou plusieurs champs sont incorrect ... '
        ])->withInput(['email']);
    }
    public function doRegister(RegisterRequest $request)
    {

        $credentials = $request->validated();

        // dd($request);

        $credentials['email_verified_token'] = Str::random(60); // Générer un token

        // dd($credentials);

        // dd($credentials['password'], $credentials['passwords'], $credentials['password'] != $credentials['passwords']);

        if (User::create($credentials)) {

            // Auth::attempt($credentials);

            // $user = Auth::user();

            $request->session()->regenerate();

            // Récupérer l'utilisateur juste après l'avoir enregistré
            $user = User::where('email', $credentials['email'])->first();

            $admin = User::where('role_id', 1)->get();

            // dd($credentials);

            if ($user) {

                // Mail::to($user->email)->send(new VerificationRegisterEmail($user));

                if ($admin) {

                    // Notification::send($admin, new RegisterEmailNotification($user, $credentials['email_verified_token']));
                }
            }


            // Auth::loginUsingId(1);

            return view('auth.isMailling');
        }

        return to_route('auth.register')->withErrors([
            'name' => 'Un ou plusieurs champs sont incorrect ... ',
            'email' => 'Un ou plusieurs champs sont incorrect ... ',
            'password' => 'Un ou plusieurs champs sont incorrect ... ',
            // 'passwords' => 'Un ou plusieurs champs sont incorrect ... '
        ])->withInput(['email', 'name']);
    }
}

// if (Auth::viaRemember()) {
//     // ...
// }