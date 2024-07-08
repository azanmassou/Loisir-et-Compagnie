<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthPasswordRequest;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function register()
    {

        return view('auth.register');
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

            // $admin = User::where('role_id', 1)->get();

            // // dd($credentials);

            // if ($user) {

            //     // Mail::to($user->email)->send(new VerificationRegisterEmail($user));

            //     if ($admin) {

            //         // Notification::send($admin, new RegisterEmailNotification($user, $credentials['email_verified_token']));
            //     }
            // }


            // Auth::loginUsingId(1);

            return view('auth.login');
        }

        return to_route('auth.register')->withErrors([
            'username' => 'Oups ... Un ou plusieurs champs sont incorrect !!! ',
            'email' => 'Oups ...Un ou plusieurs champs sont incorrect ... !!!',
            'password' => 'Oups ...Un ou plusieurs champs sont incorrect ... !!!',
            // 'passwords' => 'Un ou plusieurs champs sont incorrect ... '
        ])->withInput(['email', 'name', 'terms']);
    }


    public function login()
    {

        return view('auth.login');
    }


    public function doLogin(LoginRequest $request)
    {

        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->orWhere('username', $credentials['email'])->first();

        if ($user && $user->email_verified_at == null) {

            return to_route('auth.login')->withErrors([
                'email' => 'Oups ... Ce compte utilisateur n\'est pas encore valide !!!',
                // 'password' => 'Un ou plusieurs champs sont incorrect ... '
            ])->withInput(['email']);
        }

        if (Auth::attempt($credentials, $request->has('remember-me'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            // if ($user->role->name === 'admin') {

            //     return redirect()->intended(route('admin.dashbord'));
            // }
            return redirect()->intended(route('admin.dashbord'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Oups ... E-mail ou mot de passe incorrect !!!',
            'password' => 'Oups ... E-mail ou mot de passe incorrect !!!'
        ])->withInput(['email', 'password']);
    }

    public function reset()
    {

        return view('auth.reset');
    }

    public function doReset(ResetRequest $request)
    {

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {

            $reset_token = Str::random(60); // Générer un token

            $user->email_verified_token = $reset_token;

            $user->save();

            // Mail::to($request->input('email'))->send(new VerificationResetPasswordEmail($reset_token));

            // $admin = User::where('role_id', 1)->get();

            // if ($admin) {

            //     Notification::send($admin, new EmailResetingNotification($user, $reset_token));
            // }



            return view('includes/success');
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


    public function confirm()
    {

        return view('auth.confirm');
    }

    public function doConfirm(ConfirmRequest $request)
    {

        $credentials = $request->validated();

        if ($credentials['password'] !== $credentials['passwords']) {

            return to_route('auth.register')->withErrors([

                'password' => 'Oups ... Veillez entrer des values identique !!!',

                // 'passwords' => 'Les Champs ne sont identiques'
            ])->withInput(['password']);
        }

        $user = User::where('email', "azanmassouhappylouis@gmail.com")->first();

        // dd($user->password);

        $user->password = $credentials['password'];

        if (Hash::check($credentials['password'], $user->password)) {
            // The passwords match...

            $user->password = $credentials['password'];

            $user->save();
        }

        // dd($user->password);

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

        return view('includes.success');
    }


    public function logout()
    {
        Auth::logout();

        // Supprimer le cookie "Remember Me"
        return to_route('auth.login')->withCookie(\Illuminate\Support\Facades\Cookie::forget('email'));
    }
    public function auth()
    {
        return view('auth.auth');
    }
    public function doAuth(AuthPasswordRequest $request)
    {
        $user = User::find(Session::get('user_id'));

        if (!$user) {
            return redirect()->route('auth.login')->withErrors(['email' => 'Session expirée. Veuillez vous reconnecter.']);
        }
    
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            Session::forget('user_id');
            Session::put('lastActivityTime', time());  // Mettre à jour l'activité après connexion
            $previousUrl = Session::get('previous_url', '/dashboard');
            Session::forget('previous_url');
            return redirect()->intended($previousUrl);
        } else {
            return back()->withErrors(['password' => 'Le mot de passe est incorrect']);
        }
    }
}
