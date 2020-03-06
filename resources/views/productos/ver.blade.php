@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-6 offset-md-3 mt-5 bg-light p-4 text-center">
            <table align="center" class="table table-striped table-bordered">
                <thead>
                <th><span class="fas fa-tags"></span> Nombre</th>
                <th><span class="fas fa-database"></span> Stock</th>
                <th><span class="fas fa-dollar-sign"></span> Precio</th>
                <th><span class="fas fa-file-alt"></span> Descripcion</th>
                <th><span class="fas fa-check"></span> Acciones</th>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->stock}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>
                            <a href="{{route('productos.editar',['id'=>$producto->id])}}" class="m-1"> Editar</a>
                            <a href="{{route('productos.borrar',['id'=>$producto->id])}}" class="m-1"> Borrar</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
