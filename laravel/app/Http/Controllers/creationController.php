<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class creationController extends Controller
{
    public function newProduct(Request $request)
    {
        return view('newProduct');
    }

    public function newEvent(Request $request)
    {
        return view('newEvent');
    }

    public function newProductVerif(Request $request)
    {
        //on test les entrées
        $validator = Validator::make($request->all(), ['title' => 'required|min:4', 'description' => 'required|min:10|max:255', 'price' => 'required|numeric|min:0.1|max:1000']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
            $color = 'red';
        } else {
            $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
            $requete = $bdd->prepare("CALL `newProduct`(:title, :description, :prix);");
            $requete->bindValue(':title', $request->title, PDO::PARAM_STR);
            $requete->bindValue(':description', $request->description, PDO::PARAM_STR);
            $requete->bindValue(':prix', $request->price, PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
            $error = "Produit ajouté";
            $color = 'green';
        }
        return view('newProduct', ['error' => $error, 'color' => $color]);
    }

    public function newEventVerif(Request $request)
    { //on test les entrées
        $validator = Validator::make($request->all(), ['email' => 'required|email:rfc,dns', 'password' => 'required']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
        }
        //on f
        return view('newEvent');
    }
}
