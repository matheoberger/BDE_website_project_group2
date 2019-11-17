<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class ArticleController extends Controller
{
    public function removeFromBasket($id)
    {
        $bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd2->prepare("CALL `deleteProductToBasket`(:userID, :productID)");
        $requete->bindValue(":userID", session("id_user"), PDO::PARAM_STR);
        $requete->bindValue(":productID", $id, PDO::PARAM_STR);
        $requete->execute();
        $result = $requete->fetchAll();
        $requete->closeCursor();

        $requete = $bdd2->prepare("CALL `getBasketFromEmail`(:userID)");
        $requete->bindValue(":userID", session("email"), PDO::PARAM_STR);
        $requete->execute();
        $result2 = $requete->fetchAll();
        $requete->closeCursor();
        if (empty($result2)) {
            $requete = $bdd2->prepare("CALL `deleteBasket`(:userID)");
            $requete->bindValue(":userID", session("id_user"), PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        }
        return redirect('/panier');
    }
}
