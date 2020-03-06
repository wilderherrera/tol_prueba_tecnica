@extends('layouts.app')
@section('content')
    <div class="col-md--10">
        <table class="table table-striped table-bordered">
            <thead>
                <th><span class="fa fa-tags"></span> Nombre</th>
                <th><span class="fas fa-dollar-sign"></span> Precio</th>
            </thead>
            <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}}</td>
                <td>{{$producto->precio}}}</td>
            </tr>
             @foreach()
                 <tr>Total</tr>
                 <tr>{{$total}}</tr>
            </tbody>

        </table>

    </div>

@endsection
