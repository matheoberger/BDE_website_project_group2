<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function gethtml()
    {
        return view('login');
    }
}
