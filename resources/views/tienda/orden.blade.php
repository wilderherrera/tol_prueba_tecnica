@extends('layouts.app')
@section('content')
    <div class="col-md-8 offset-md-2 mt-5 bg-light p-5">
        <table class="table table-striped table-bordered p-5">
            <thead>
                <th><span class="fa fa-tags"></span> Nombre</th>
                <th><span class="fas fa-dollar-sign"></span> Precio</th>
            </thead>
            <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{number_format($producto->precio)}} <a href="{{route('quitar_de_carrito',['id'=>$producto->id])}}" class="text-danger"><span class="fas fa-trash-alt"></span></a></td>
            </tr>
             @endforeach
                 <tr>
                     <td colspan="2" class="text-center">Total orden: <b>{{number_format($total)}}</b></td>
                 </tr>

            </tbody>

        </table>
         @if($total>0)
            <a href="{{route('orden.finalizar')}}"><h4 class="text-center btn btn-success text-white"><b><span class="fas fa-check"></span> Completar compra</b></h4></a>
             @endif
    </div>

@endsection
