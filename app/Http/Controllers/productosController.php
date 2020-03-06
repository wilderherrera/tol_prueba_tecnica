<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;
class productosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        ]);

        productos::create([
            'nombre'=>$request->input('nombre'),
            'precio'=>$request->input('precio'),
            'descripcion'=>$request->input('descripcion'),
            'stock'=>$request->input('stock'),
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


        productos::find($id)->update([
            'nombre'=>$request->input('nombre'),
            'precio'=>$request->input('precio'),
            'stock'=>$request->input('stock'),
            'descripcion'=>$request->input('descripcion'),
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
