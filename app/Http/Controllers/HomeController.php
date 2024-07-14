<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        /*Si aplico un middleware auth, bloquearé el acceso al resto 
        de métodos que yo tenga
        Para verlo, vamos a kernel -> middlewareAliases -> auth, 
        con esto los métodos serán privados*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
