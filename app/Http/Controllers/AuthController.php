<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Utilisation du Hash pour la validation du mot de passe
use App\Models\Collaborateur;
use App\Models\Log;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('login');
    }

    // Gestion de la connexion
    public function login(Request $request)
    {
        // ...existing code...

        $user = Collaborateur::where('mail', $request->username)->first();

        if ($user && Hash::check($request->password, $user->mot_de_passe)) {
            Session::put('user', $user);

            // Écriture dans les logs (login)
            Log::create([
                'collaborateur_id' => $user->id,
                'action' => 'login',
                'created_at' => now(),
            ]);

            return redirect('/connected');
        }

        return back()->withErrors(['login' => 'Identifiants incorrects.']);
    }


public function logout()
    {
        $user = Session::get('user');
        if ($user) {
            // Écriture dans les logs (logout)
            Log::create([
                'collaborateur_id' => $user->id,
                'action' => 'logout',
                'created_at' => now(),
            ]);
        }

        Session::forget('user');
        return redirect('/login');
    }
}
