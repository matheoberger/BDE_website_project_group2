<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentPicture extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        return response(session('role'), 200)
                  ->header('Content-Type', 'text/plain');
        //return view('eventType', ["id"=>$id]);;
    }
}
