@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3 my-4 bg-light p-5" style="border-radius: 15px">
        <h4 class="text-secondary text-center">{{$usuario->nombre}}</h4>

        <table class="table table-bordered">
            <tr>
        @if(Auth::user()->admin)
             <td><a class="text-info" href="{{route('productos.index')}}"><span class="fas fa-database"></span> Ver inventario</a></td>
        @endif

            </tr>
        </table>
        <h5 class="text-center">Tus ordenes</h5>
        <table align="center" class="table table-striped table-bordered">
            <thead class="text-center">
            <th>ID de orden</th>
            <th>Valor de la orden</th>
            </thead>
            <tbody class="text-center">
            @foreach($usuario->ordenes_rel as $ordenes)
                <tr>
                    <td>
                        <p><b>{{$ordenes->id}}</b> </p>
                    </td>
                    <td><p> $ {{number_format($ordenes->total)}}</p></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
