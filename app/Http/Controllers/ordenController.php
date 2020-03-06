<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
use App\productos_ordenes;
class ordenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orden(){
        $orden=$this->get_productos_from_carrito();
            return view('tienda.orden')->with(['productos' => $orden['productos'], 'total' => $orden['costo_total']]);


    }

    public function finalizar(){

        $orden=$this->get_productos_from_carrito();

        $id_orden=\App\ordenes::create([
            'total'=>$orden['costo_total'],
            'id_usuarios'=>\Auth::user()->id,
        ])->id;

        foreach($orden['productos'] as $producto)
            {
                 productos::find($producto->id)->update([
                            'stock'=>productos::find($producto->id)['stock']-1,
                 ]);
                 productos_ordenes::create([
                        'id_productos'=>$producto->id,
                        'id_ordenes'=>$id_orden,
                 ]);
            }

        \Session::forget('productos_carrito'); // Limpieza de carrito de compra en session
        return view('tienda.orden_finalizar')->with(['productos' => $orden['productos'], 'total' => $orden['costo_total']]);
    }



    public function get_productos_from_carrito(){
    $costo_total=0;
    $orden=[];
    if(\Session::has('productos_carrito')) {
        foreach (\Session::get('productos_carrito') as $producto) {
            array_push($orden, productos::find($producto));
            $costo_total += productos::find($producto)['precio'];
            }

        }

        return(['productos'=>$orden,'costo_total'=>$costo_total]);

    }
}
