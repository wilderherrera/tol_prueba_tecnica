<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carritoController extends Controller
{

    public function addProducto(Request $request){
        if(!$request->session()->has('prueba'))
        {
            $request->session()->put('prueba',[]);
        }

         $request->session()->push('prueba',$request->input('id'));

        return response()->json(['id_carrito'=>$request->session()->get('prueba')]);

    }

    public function subbProducto(Request $request){
        $id_array = $request->session()->pull('prueba', []); // Second argument is a default value
        if(($key = array_search($request->input('id'), $id_array)) !== false) {
            unset($id_array[$key]);
        }
        $request->session()->put('prueba', $id_array);

        return response()->json(['id_carrito'=>$request->session()->get('prueba')]);
    }

}
