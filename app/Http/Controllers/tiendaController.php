<?php

namespace App\Http\Controllers;
use App\productos;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    public function index(){

            return view('tienda.principal')
                    ->with([
                        'productos'=>productos::all(),
                    ]);
    }

}
