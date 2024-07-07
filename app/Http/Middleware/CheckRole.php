<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        try {

            $user = Auth::user(); 
            
            // dd($user->role->name);

            if(!$user || !$user->role || $user->role->name !== $role){

                return to_route('auth.login');
            }
        }

        catch (Exception $e){

            return response()->json(['message' => 'Acces non autorise' , 403]);
        }
        return $next($request);
    }
}
