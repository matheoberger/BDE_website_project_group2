<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class deleteEvent extends Controller
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
        $requete = $bdd->prepare("CALL `deleteEvent`(:p_id_event);");
        $requete->bindValue(':p_id_event', $request->id_event, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        $requete->closeCursor();
        return response(200);

    }
}
