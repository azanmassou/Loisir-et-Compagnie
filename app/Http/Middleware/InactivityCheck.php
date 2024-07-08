<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class InactivityCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $timeout = 600; // Temps d'inactivité en secondes (10 secondes pour le test, ajustez selon vos besoins)

        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            if ($lastActivity && (time() - $lastActivity) > $timeout) {
                Session::put('user_id', Auth::id());
                Session::put('previous_url', url()->current());
                Auth::logout();
                Session::forget('lastActivityTime');
                return redirect()->route('auth.auth');
            }
            Session::put('lastActivityTime', time());
        }

        return $next($request);
    }
}
