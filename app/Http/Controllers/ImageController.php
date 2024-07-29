<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        /*Si aplico un middleware auth, bloquearé el acceso al resto 
        de métodos que yo tenga
        Para verlo, vamos a kernel -> middlewareAliases -> auth, 
        con esto los métodos serán privados*/
    }

    public function create(){
        return view('images.create');
    }


}
