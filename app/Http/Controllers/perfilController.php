<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class perfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.principal')->with('usuario',\App\User::find(\Auth::user()->id));
    }
}
