<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\Mail;

class BasketController extends Controller
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

    public function addInBasket($id)
    {
        $bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd2->prepare("CALL `getBasketFromEmail`(:userID)");
        $requete->bindValue(":userID", session("email"), PDO::PARAM_STR);
        $requete->execute();
        $result2 = $requete->fetchAll();
        $requete->closeCursor();
        if (empty($result2)) {
            $requete = $bdd2->prepare("CALL `newBasket`(:userID)");
            $requete->bindValue(":userID", session("id_user"), PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        }

        $requete = $bdd2->prepare("CALL `addProductToBasket`(:userID, :productID, 1)");
        $requete->bindValue(":userID", session("id_user"), PDO::PARAM_INT);
        $requete->bindValue(":productID", $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->closeCursor();
        return redirect("/boutique/$id");
    }

    public function changeAmountInBasket($id, Request $request)
    {
        $bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");

        $requete = $bdd2->prepare("CALL `amountInSell`(:productID)");
        $requete->bindValue(":productID", $id, PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll();
        $requete->closeCursor();
        if ($result[0]['amount'] > $request->input('amount')) {
            $requete = $bdd2->prepare("CALL `changeAmountInBasket`(:userID, :productID, :amount)");
            $requete->bindValue(":userID", session("id_user"), PDO::PARAM_INT);
            $requete->bindValue(":productID", $id, PDO::PARAM_INT);
            $requete->bindValue(":amount", $request->input('amount'), PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        }
        return redirect("/panier");
    }

    public function order()
    {
        $bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd2->prepare("CALL `getBasketFromEmail`(:userID)");
        $requete->bindValue(":userID", session("email"), PDO::PARAM_STR);
        $requete->execute();
        $products = $requete->fetchAll();
        $requete->closeCursor();
        if (!empty($products)) {
            $data = array(
                'email' => session("email"),
                'subject' => "Nouvelle vente",
                'data' => $products
            );
            Mail::send('emails.sell', $data, function ($mail) use ($data) {
                $mail->from($data['email']);
                $mail->to('bde.cesi.bordeaux.projetgroupe2@gmail.com');
                $mail->subject($data['subject']);
            });
            $requete = $bdd2->prepare("CALL `setOrdered`(:userID)");
            $requete->bindValue(":userID", session("id_user"), PDO::PARAM_STR);
            $requete->execute();
            $requete->closeCursor();
        }
        return redirect("/");
    }
}
