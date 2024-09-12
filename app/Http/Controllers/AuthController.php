<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //le controller Auth me permettra de gérer la connexion au niveau de l'admin 

    public function login(Request $request)
    {
        //je m'assure avec cette variable que mes champs sont valides
    $request->validate([
        'email' =>'required|string|email',
        'password' => 'required|string',
    ]);

     // ma variable va récupérer les infos de ces deux champs dans le formulaire
     $credentials = $request->only('email','password');

      // La méthode attempt sera utiliser pour gérer les tentatives d'authentification à partir du formulaire de connexion
      if (Auth::attempt($credentials)) {
        // si l'authentification est réussie

        $user = Auth::user();  //la variabe user représente l'utilisateur pour lequel je dois générer un jeton 

        // Vérifiez si l'utilisateur est un administrateur
        $isAdmin = $user->role_id === 1; 

        return response()->json(
            [
                'User' => $user,
                'isAdmin' => $isAdmin,
                'status' => 200,
                'message' => 'Utilisateur connecté',
            ], 200);
      } else {
       //si l'authentifiaction a échoué 
       return response()->json(
        [
         'message' => 'La connexion a échouée'
        ],401);

      }
      
   }

   //la fonction qui va gérer la déconnexion de l'administrateur 
   public function logout()
    {
         Auth::logout();
        return response()->json([
            'status' => 200,
            'message' => 'Utilisateur déconnecté'
        ]);
    }
}
      
