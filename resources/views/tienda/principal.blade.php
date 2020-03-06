@extends('layouts.app')
@section('content')
    <div class="row p-5">
        @forelse($productos as $producto)
        <div class="col-md-4 my-3">
            <div class="card">
            <div class="card-body bg-light">
                <h5 class="card-title">{{$producto->nombre}}</h5>
                <p class="card-text"><b>Descripcion: </b>{{$producto->descripcion}}</p>
                <hr>
                <p class="card-text"><b>Precio: </b>{{$producto->precio}}</p>
                <p class="card-text"><b>Disponibilidad: </b> {{$producto->stock}} Unidades</p>
            </div>
                <hr>
                <p onclick="add_carrito({{$producto->id}})"> Añadir al carrito</p>
                <p onclick="subb_carrito({{$producto->id}})"> Quitar del carrito</p>
            </div>
        </div>
        @empty
            <div class="col-md-6 offset-md-3 mt-5 bg-light p-4 text-center">
                <h1><span class="fas fa-box-open text-warning" style="font-size:50px"></span></h1>
                <p><b>NO SE ENCONTRARON PRODUCTOS REGISTRADOS</b></p>
            </div>
        @endforelse
    </div>
@endsection
@section('javascript')
    <script>
        $('#carrito_conteo').hide();
        var conteo=0;
        function add_carrito(id) {
            conteo++;
            $('#carrito_conteo').show(1000);
            $('#carrito_conteo').html(conteo);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'{{route('carrito_add')}}',
                method:'post',
                dataType:'json',
                data:{'id':id},
            });
        }
        function subb_carrito(id) {
                conteo--;
                if(conteo==0){
                    $('#carrito_conteo').hide(1000);
                }
                $('#carrito_conteo').html(conteo);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    url:'{{route('carrito_subb')}}',
                    method:'post',
                    dataType:'json',
                    data:{'id':id},
                });
        }
    </script>
    @endsection
