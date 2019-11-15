<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    //afficher la page sans remplissage
    public function getContact()
    {
        return view('contactForm');
    }

    public function postContact(Request $request)
    {
        //verification des données passées en post
        $validator = Validator::make($request->all(), ['email' => 'required|email:rfc,dns', 'subject' => 'min:5|max:50', 'message' => 'min:50']);
        if ($validator->messages()->first()) {
            //si il y a des erreurs on renvoi la première
            $error = $validator->messages()->first();
            $color = 'red';
        } else {
            $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'bodymessage' => $request->message
            );
            //on envoi le mail avec les données souhaitées
            Mail::send('emails.contact', $data, function ($mail) use ($data) {
                $mail->from($data['email']);
                $mail->to('bde.cesi.bordeaux.projetgroupe2@gmail.com');
                $mail->subject($data['subject']);
            });
            //on indique le succès de l'opération
            $error = "Formulaire envoyé avec succès";
            $color = 'green';
        }
        //on retourne la vue formulaire avec l'erreur ou le succès en conservant les données précédements remplies
        return view('contactForm', ['error' => $error, 'color' => $color, 'email' => $request->email, 'subject' => $request->subject, 'message' => $request->message]);
    }
}
