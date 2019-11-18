<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class eventController extends Controller
{
    public function addpicture($id)
    {
        return view('addpicture', ['id' => $id]);
    }

    public function addpictureVerif($id, Request $request)
    {
        $validator = Validator::make($request->all(), ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
            $color = 'red';
        } else {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
            $requete = $bdd->prepare("CALL `addPicture`(:title, :url, :id_user);");
            $requete->bindValue(':title', $imageName, PDO::PARAM_STR);
            $requete->bindValue(':url', "images/$imageName", PDO::PARAM_STR);
            $requete->bindValue(':id_user', session('id_user'), PDO::PARAM_INT);
            $requete->execute();
            $requete->closeCursor();
            $requete = $bdd->prepare("CALL `addPictureOnEvent`(:id_event);");
            $requete->bindValue(':id_event', $id, PDO::PARAM_INT);
            $requete->execute();
            $requete->closeCursor();
            $error = "Upload réussi";
            $color = 'green';
        }
        return view('addpicture', ['error' => $error, 'color' => $color, 'image' => $imageName, 'id' => $id]);
    }

    public function reportPicture($id)
    {
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `setPictureVisibility`(:id_picture, 0);");
        $requete->bindValue(':id_picture', $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->closeCursor();
        return back();
    }
}
