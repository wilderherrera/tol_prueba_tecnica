@extends('layouts.app')
@section('content')
    <div class="col-md-6 offset-md-3 p-5 my-5 bg-light text-center">
        <h1><a href="/"><span class="fas fa-home"></span></a> Gracias por tu compra</h1>
        <h4 class="text-secondary"> Resumen de tu compra</h4>
        <table class="table table-striped table-bordered p-5">
            <thead>
            <th><span class="fa fa-tags"></span> Nombre</th>
            <th><span class="fas fa-dollar-sign"></span> Precio</th>
            </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{number_format($producto->precio)}} </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="text-center">Total orden: <b>{{number_format($total)}}</b></td>
        </tr>

        </tbody>

        </table>
    </div>
    @endsection
