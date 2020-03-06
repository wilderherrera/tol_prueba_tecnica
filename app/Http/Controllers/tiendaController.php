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
    public function orden(){
            $orden=[];
            $costo_total=0;
            if(\Session::has('productos_carrito')) {
                foreach (\Session::get('productos_carrito') as $producto) {
                    array_push($orden, productos::find($producto));
                    $costo_total += productos::find($producto)['precio'];
                }

                return view('tienda.orden')->with(['productos' => $orden, 'total' => $costo_total]);
            }

    }
    public function quitar_producto_carrito($id){

        $id_array = \Session::pull('productos_carrito', []); // Second argument is a default value
        if(($key = array_search($id, $id_array)) !== false) {
            unset($id_array[$key]);
        }
        \Session::put('productos_carrito', $id_array);

        return redirect(route('orden'));
    }
}
