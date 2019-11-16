<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class editEvent extends Controller
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
        $requete = $bdd->prepare("CALL `editEvent`(:event, :title, :place, :description);");
        $requete->bindValue(':event', $request->event, PDO::PARAM_INT);
        $requete->bindValue(':title', $request->title, PDO::PARAM_STR);
        $requete->bindValue(':place', $request->place, PDO::PARAM_STR);
        $requete->bindValue(':description', $request->description, PDO::PARAM_STR);
        $requete->execute();
        $data = $requete->fetchAll();
        $requete->closeCursor();
        return response(200);

    }
}
