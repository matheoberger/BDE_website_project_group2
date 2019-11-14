<?php

namespace App\Http\Controllers;

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
        $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
        }
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `getUserFromEmail`(:email);");
        $requete->bindValue(':email', $request->email, PDO::PARAM_STR);
        $requete->execute();
        $user = $requete->fetchAll();
        $requete->closeCursor();
        if (!empty($user)) {
            if (password_verify($request->password, $user[0]["password"])) {
                $error = "Vous êtes bien connecté";
            } else {
                $error = "Adresse Email ou mot de passe incorrect";
            }
        } else {
            $error = "Adresse Email ou mot de passe incorrect";
        }
        return view('login', ['error' => $error]);
    }
}
