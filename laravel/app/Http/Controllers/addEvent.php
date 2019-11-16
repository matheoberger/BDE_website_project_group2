<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class newEvent extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if(session('role') != "Administrator"){
            return abort(403);
        }
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `newEvent`(:title, :place, :description, :startingDate, :endingDate, :userid);");
        $requete->bindValue(':title', $request->title, PDO::PARAM_STR);
        $requete->bindValue(':place', $request->place, PDO::PARAM_STR);
        $requete->bindValue(':description', $request->description, PDO::PARAM_STR);
        $requete->bindValue(':startingDate', $requete->startingdate, PDO::PARAM_STR);
        $requete->bindValue(':endingDate', $requête->endingdate, PDO::PARAM_STR);
        $requete->bindValue(':userid', $requête->userid, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        $requete->closeCursor();
        return response(200);

    }
}
