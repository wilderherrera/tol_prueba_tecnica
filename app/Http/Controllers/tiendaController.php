<?php

namespace App\Http\Controllers;
use App\productos;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    public function index(Request $request){
            if(\Session::has('productos_carrito') && is_array(\Session::get('productos_carrito')))
                {
                    $productos_carrito=count(\Session::get('productos_carrito'));
                }
            else{
                $productos_carrito=0;
            }
            return view('tienda.principal')
                    ->with([
                        'productos'=>productos::all(),
                        'productos_carrito'=>$productos_carrito,
                    ]);
    }


}
