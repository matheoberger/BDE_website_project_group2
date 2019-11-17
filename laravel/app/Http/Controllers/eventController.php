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

            $error = "Upload réussi";
            $color = 'green';
        }
        return view('addpicture', ['error' => $error, 'color' => $color, 'image' => $imageName, 'id' => $id]);
    }
}
