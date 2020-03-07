<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
class productosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.ver')->with('productos',productos::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
                'nombre'=>'required|unique:productos',
                'precio'=>'required|min:0',
                'descripcion'=>'required',
                'stock'=>'required',
                'imagen_producto'=>'image|max:5000',
        ]);

        $id_producto=productos::create([
            'nombre'=>$request->input('nombre'),
            'precio'=>$request->input('precio'),
            'descripcion'=>$request->input('descripcion'),
            'stock'=>$request->input('stock'),

        ])->id;

        $path_foto=$request->file('imagen_producto')
            ->storeAs('/imagenes',
                $id_producto.'.'.$request->file('imagen_producto')->getClientOriginalExtension(),'public');

        productos::find($id_producto)->update([
            'imagen_producto'=>$path_foto,
        ]);

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('productos.editar')->with(['producto'=>productos::find($id)->first(),
                                                     'producto_id'=>$id,
                                                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation=$request->validate([

            'precio'=>'required|min:0',
            'descripcion'=>'required',
            'stock'=>'required',
            'imagen_producto'=>'image|max:5000',
        ]);

        productos::find($id)->update([
            'nombre'=>$request->input('nombre'),
            'precio'=>$request->input('precio'),
            'stock'=>$request->input('stock'),
            'descripcion'=>$request->input('descripcion'),

        ]);

        $path_foto=$request->file('imagen_producto')
            ->storeAs('/imagenes',
                $id.'.'.$request->file('imagen_producto')->getClientOriginalExtension(),'public');

        productos::find($id)->update([
            'imagen_producto'=>$path_foto,
        ]);
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        productos::destroy($id);
        return redirect(route('productos.index'));
    }
}
