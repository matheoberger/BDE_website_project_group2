<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class likePicture extends Controller
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
        $checkParticipation = $bdd->prepare("CALL `isRegistered`(:user, :event);");
        $checkParticipation->bindValue(':user', session('id_user'), PDO::PARAM_INT);
        $checkParticipation->bindValue(':event', $request->event, PDO::PARAM_INT);
        $checkParticipation->execute();
        $paticipation=$checkParticipation->fetchAll();
        if(empty($paticipation)){
            return abort(403);
        }
        $checkParticipation->closeCursor();

        $requete = $bdd->prepare("CALL `setLiked`(:picture, :user);");
        
        $requete->bindValue(':picture', $request->picture, PDO::PARAM_INT);
        $requete->bindValue(':user', session('id_user'), PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        $requete->closeCursor();
        return response(200);
        //return view('eventType', ["id"=>$id]);;
    }
}
