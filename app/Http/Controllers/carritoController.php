<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class carritoController extends Controller
{

    public function addProducto(Request $request){
        if(!Session::has('productos_carrito'))
        {
            Session::put('productos_carrito',[]);
        }

        Session::push('productos_carrito',$request->input('id'));
        Session::save();
        return response()->json([count(Session::get('productos_carrito'))]);

    }

    public function subbProducto(Request $request){
        $id_array = Session::pull('productos_carrito', []); // Second argument is a default value
        if(($key = array_search($request->input('id'), $id_array)) !== false) {
            unset($id_array[$key]);
        }
        Session::put('productos_carrito', $id_array);

        return response()->json([count(Session::get('productos_carrito'))]);
    }

}
