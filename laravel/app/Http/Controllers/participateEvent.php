<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class participateEvent extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
        $requete = $bdd->prepare("CALL `setUserRegistered`(:event, :user);");
        $requete->bindValue(':event', $request->event, PDO::PARAM_INT);
        $requete->bindValue(':user', session('id_user'), PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        $requete->closeCursor();
        return response($request, 200)
                  ->header('Content-Type', 'text/plain');
        //return view('eventType', ["id"=>$id]);;
    }
}
