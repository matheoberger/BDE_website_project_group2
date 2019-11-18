<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class creationController extends Controller
{
    public function newProduct()
    {
        if (session('role') ==  "Administrator") {
            return view('newProduct');
        }
    }

    public function newEvent()
    {
        if (session('role') == "Administrator") {
            return view('newEvent');
        }
    }

    public function newProductVerif(Request $request)
    {
        if (session('role') ==  "Administrator") {
            //on test les entrées
            $validator = Validator::make($request->all(), ['title' => 'required|min:4',  'description' => 'required|min:10|max:255', 'price' => 'required|numeric|min:0.1|max:1000']);
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
    }

    public function newEventVerif(Request $request)
    {
        if (session('role') ==  "Administrator") {
            //on test les entrées
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:4', 'description' => 'required|min:10|max:255', 'price' => 'numeric|min:0|max:1000',
                'starting_date' => 'required|date_format:Y-m-d', 'ending_date' => 'required|date_format:Y-m-d'
            ]);
            if ($validator->messages()->first()) {
                //si il y a des erreurs on renvoi la première
                $error = $validator->messages()->first();
                $color = 'red';
            } else {
                $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
                $requete = $bdd->prepare("CALL `newEvent`(:title, :place, :description, :starting_date, :ending_date, :user ,:price);");
                $requete->bindValue(':title', $request->title, PDO::PARAM_STR);
                $requete->bindValue(':place', $request->place, PDO::PARAM_STR);
                $requete->bindValue(':description', $request->description, PDO::PARAM_STR);
                $requete->bindValue(':price', $request->price, PDO::PARAM_STR);
                $requete->bindValue(':starting_date', $request->starting_date, PDO::PARAM_STR);
                $requete->bindValue(':ending_date', $request->ending_date, PDO::PARAM_STR);
                $requete->bindValue(':user', session('id_user'), PDO::PARAM_INT);
                $requete->execute();
                $requete->closeCursor();
                if (!empty($request->previous_event)) {
                    $requete = $bdd->prepare("CALL `setid_previous_event`(:id_previous_event);");
                    $requete->bindValue(':id_previous_event', $request->previous_event, PDO::PARAM_STR);
                    $requete->execute();
                    $requete->closeCursor();
                }
                $requete = $bdd->prepare("CALL `setTakePlaceBX`();");
                $requete->execute();
                $requete->closeCursor();
                $requete2 = $bdd->prepare("CALL `setDefaultPicturesEvent`();");
                $requete2->execute();
                $requete2->closeCursor();
                $error = "Ajout de l'événement réussi";
                $color = 'green';
            }
            //on f
            return view('newEvent', ['error' => $error, 'color' => $color]);
        }
    }
    public function deleteEvent($id)
    {
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `deleteEvent`(:id_event);");
        $requete->bindValue(':id_event', $id, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();
        return redirect('/event');
    }
}
