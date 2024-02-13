<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et est un administrateur
        if (Auth::check() && Auth::user()->admin) {
            return $next($request); // Passer la requête au prochain middleware
        } elseif (Auth::check()) {
            return redirect()->route('dema.home'); // Rediriger les utilisateurs normaux vers leur page d'accueil
        }

        // Si l'utilisateur n'est pas authentifié, rediriger vers le formulaire de connexion
        return redirect()->route('login')->with('error', 'Veuillez vous connecter en tant qu\'utilisateur ou administrateur.');
    }
}
