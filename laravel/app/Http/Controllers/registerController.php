<?php

namespace App\Http\Controllers;

use PDO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function gethtml()
    {
        return view('register');
    }

    //fonction pour verifier si le mot de passe contient une majuscule et un chiffre
    private function verifMDP($mdp)
    {
        if ($mdp === strtolower($mdp)) {
            return false;
        } else {
            return preg_match("/.*[0-9].*/", $mdp);
        }
    }

    public function verification(Request $request)
    {
        //on test les entrées
        $validator = Validator::make($request->all(), ['email' => 'required|email:rfc,dns', 'password' => 'required|confirmed|min:4', 'firstname' => 'required|alpha', 'lastname' => 'required|alpha', 'gender' => 'required|alpha', 'birthdate' => 'required|date_format:Y-m-d']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
            //on verifie que les conditions générales sont acceptées.
        } elseif (!$request->check) {
            $error = "Vous devez accepter les conditions générales";
        } else {
            //on fait une requête à la BDD pour savoir s'il existe déja un utilisateur avec cette adresse mail
            $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
            $requete = $bdd->prepare("CALL `getUserFromEmail`(:email);");
            $requete->bindValue(':email', $request->email, PDO::PARAM_STR);
            $requete->execute();
            $user = $requete->fetchAll();
            $requete->closeCursor();
            //Si cette adresse mail n'est pas utilisé alors on peut insèrer le nouvel utilisateur
            if (empty($user)) {
                //On verifie le mot de passe
                if ($this->verifMDP($request->password)) {
                    //si le mot de passe est de format valide, on enregistre l'utilisateur dans la BDD
                    $requete = $bdd->prepare("CALL `newUser`(:lastname, :firstname, :password, :email, :birthdate, :gender, :center);");
                    $requete->bindValue(':lastname', $request->lastname, PDO::PARAM_STR);
                    $requete->bindValue(':firstname', $request->firstname, PDO::PARAM_STR);
                    $requete->bindValue(':password', password_hash($request->password, PASSWORD_BCRYPT), PDO::PARAM_STR);
                    $requete->bindValue(':email', $request->email, PDO::PARAM_STR);
                    $requete->bindValue(':birthdate', $request->birthdate, PDO::PARAM_STR);
                    $requete->bindValue(':gender', $request->gender, PDO::PARAM_STR);
                    $requete->bindValue(':center', $request->center, PDO::PARAM_STR);
                    $requete->execute();
                    $error = "Vous êtes inscrit, vous pouvez vous connecter";
                    //On renvoi à la vue connection
                    return view('login', ['error' => $error]);
                } else {
                    $error = "Le mot de passe doit contenir au minimum une majuscule et un chiffre";
                }
            } else {
                $error = "Adresse Email déja utilisé";
            }
        }
        //on renvoi au formulaire d'inscription
        return view('register', ['error' => $error]);
    }
}
