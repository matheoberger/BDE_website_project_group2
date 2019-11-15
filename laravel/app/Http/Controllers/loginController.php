<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use PDO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function gethtml()
    {
        return view('login');
    }

    public function verification(Request $request)
    {
        //on test les entrées
        $validator = Validator::make($request->all(), ['email' => 'required|email:rfc,dns', 'password' => 'required']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
        }
        //on fait un requête à la BDD pour obtenir les informations utilisateurs correspondant à l'adresses email rentrée
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `getUserFromEmail`(:email);");
        $requete->bindValue(':email', $request->email, PDO::PARAM_STR);
        $requete->execute();
        $user = $requete->fetchAll();
        $requete->closeCursor();
        //S'il existe un utilisateur avec cette adresse email, on fait les autres test
        if (!empty($user)) {
            //On verifie que les mots de passe sont indentiques
            if (password_verify($request->password, $user[0]["password"])) {
                //Si le mot de passe est bon, on enregistre les variables utilisateurs en session pour y accèder plus facilement
                session(['firstname' => $user[0]["firstname"]]);
                session(['lastname' => $user[0]["lastname"]]);
                session(['gender' => $user[0]["gender"]]);
                session(['birthdate' => $user[0]["birthdate"]]);
                session(['email' => $user[0]["email"]]);
                session(['role' => $user[0]["role"]]);
                //On redirige vers la page d'accueil
                return redirect('/');
            } else {
                $error = "Adresse Email ou mot de passe incorrect";
            }
        } else {
            $error = "Adresse Email ou mot de passe incorrect";
        }
        //Si la case "se souvenir de moi" est cochée, on enregistre l'adresse email en cookie
        if ($request->check) { }
        //en cas d'erreur on retourne la vue connection avec l'erreur
        return view('login', ['error' => $error]);
    }
}
