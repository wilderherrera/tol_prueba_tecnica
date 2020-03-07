@extends('layouts.app')
@section('content')
    <div class="col-md-6 offset-md-3 my-4 bg-light" >
        <a class="text-info" href="{{route('tienda')}}"><span class="fas fa-arrow-left"></span> Volver</a>
        <div class="row">
            <div class="col-md-6 bg-light p-4">
            <img src="{{$producto->imagen_producto}}" width="100%">
            </div>
            <div class="col-md-6 bg-light">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th> Nombre</th>
                        <td>{{$producto->nombre}}</td>
                    </tr>
                    <tr>
                        <th> Precio</th>
                        <td>{{$producto->precio}}</td>
                    </tr>
                    <tr>
                        <th> Unidades disponibles</th>
                        <td>{{$producto->stock}}</td>
                    </tr>
                    <tr>
                        <th> Descripción</th>
                        <td>{{$producto->descripcion}}</td>
                    </tr>
                    </thead>

                </table>
            </div>
            @if($producto->stock>0)
                <button class="btn btn-success" onclick="add_carrito({{$producto->id}})"><span class="fas fa-plus"></span> Añadir al carrito</button>

                <button class="btn btn-warning" onclick="subb_carrito({{$producto->id}})"><span class="fas fa-trash-alt"></span> Quitar del carrito</button>
                @else
                <p class="text-danger"><b> *Este producto no se encuentra disponible.</b></p>
            @endif
    </div>
@endsection

@section('javascript')
            <script>
                $('#carrito_conteo').hide();

                    @if($productos_carrito>0)
                var conteo={{$productos_carrito}};
                $('#carrito_conteo').show(1000);
                $('#carrito_conteo').html(' '+conteo);
                    @else
                var conteo=0;
                @endif

                function add_carrito(id) {



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
                        success:(count_productos_carrito)=>{
                            $('#carrito_conteo').show(200);
                            conteo=count_productos_carrito[0];
                            $('#carrito_conteo').html(conteo);
                        }
                    });
                }
                function subb_carrito(id) {


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
                        success:(count_productos_carrito)=>{
                            conteo=count_productos_carrito[0];
                            $('#carrito_conteo').html(conteo);
                            if(conteo==0){
                                $('#carrito_conteo').hide(500);
                            }
                        }
                    });
                }

            </script>
@endsection
