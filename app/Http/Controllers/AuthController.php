<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('authentification/login');
    }

    public function sign()
    {
        return view('authentification/sign');
    }
    public function redirectTo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->email === 'mkiemde00@gmail.com') {
                // Si l'utilisateur est un administrateur, redirigez-le vers une vue d'administration
                return route('admin.storeHouse');
            } else {
                // Sinon, redirigez-le vers une vue utilisateur normale
                return view('welcome');
            }
        }
        // Redirigez vers la page de connexion par défaut si l'utilisateur n'est pas connecté
        return route('login');
    }
}
