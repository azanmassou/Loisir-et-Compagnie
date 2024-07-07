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
        $timeout = 300; // Temps d'inactivité en secondes (30 minutes)

        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            if ($lastActivity && (time() - $lastActivity) > $timeout) {
                Session::put('user_id', Auth::id());
                Auth::logout();
                Session::forget('lastActivityTime');
                return redirect()->route('auth.auth');
            }
            Session::put('lastActivityTime', time());
        }

        return $next($request);
    }
}
