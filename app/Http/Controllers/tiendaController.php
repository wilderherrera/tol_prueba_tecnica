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
                        'productos'=>productos::paginate(5), // Maximo 5 productos en la tienda por pagina
                        'productos_carrito'=>$productos_carrito,
                    ]);
    }


    public function ver_producto($id){
        if(\Session::has('productos_carrito'))
        {
            $productos_carrito=count(\Session::get('productos_carrito'));
        }
            else{
                $productos_carrito=0;
            }

        return view('tienda.ver_producto')->with(['producto'=>\App\productos::find($id),
                                                    'productos_carrito'=>$productos_carrito,
                                                    ]);
    }

}
