<?php

namespace App\Http\Controllers;
use App\productos;

use Illuminate\Http\Request;

class tiendaController extends Controller
{
    public function index(Request $request){

            return view('tienda.principal')
                    ->with([
                        'productos'=>productos::all(),
                        'productos_carrito'=>0,
                    ]);
    }
    public function orden(){
            $orden=[];

            if(\Session::has('productos_carrito'))
            {
                foreach(\Session::get('productos_carrito') as $producto)
                {
                    array_push($orden,productos::find($producto));

                }
                return view('tienda.orden')->with('productos',$orden);
            }

    }
}
