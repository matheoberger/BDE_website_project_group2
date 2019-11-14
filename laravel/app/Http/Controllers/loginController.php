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
                session(['firstname' => $user[0]["firstname"]]);
                session(['lastname' => $user[0]["lastname"]]);
                session(['gender' => $user[0]["gender"]]);
                session(['birthdate' => $user[0]["birthdate"]]);
                session(['email' => $user[0]["email"]]);
                session(['role' => $user[0]["role"]]);
                return redirect('/');
            } else {
                $error = "Adresse Email ou mot de passe incorrect";
            }
        } else {
            $error = "Adresse Email ou mot de passe incorrect";
        }
        if ($request->check) {
            Cookie::make('email', $request->email, 60 * 24 * 365);
        }
        return view('login', ['error' => $error, 'password' => ""]);
    }
}
