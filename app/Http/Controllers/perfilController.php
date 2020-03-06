<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perfilController extends Controller
{
    public function index(){
        return view('perfil.principal');
    }
}
