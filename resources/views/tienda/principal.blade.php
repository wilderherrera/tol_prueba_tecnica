@extends('layouts.app')
@section('content')
    <div class="row p-5">
        @forelse($productos as $producto)
        <div class="col-md-4 my-3">
            <div class="card">
                <a href="{{route('producto.ver',['id'=>$producto->id])}}"><img class="card-img-top" src="{{$producto->imagen_producto}}" alt="Card image cap" height="300" width="100"></a>
            <div class="card-body bg-light">
                <h5 class="card-title">{{$producto->nombre}}</h5>
                <p class="card-text"><b>Descripcion: </b>{{$producto->descripcion}}</p>
                <hr>
                <p class="card-text"><b>Precio: </b>{{$producto->precio}}</p>
                <p class="card-text"><b>Disponibilidad: </b> {{$producto->stock}} Unidades</p>
            </div>
                <hr>
                @if($producto->stock>0)
                <div class="col-md-6 offset-md-3 text-center">
                    <button class="btn btn-success" onclick="add_carrito({{$producto->id}})"><span class="fas fa-plus"></span> Añadir al carrito</button>
                    <hr>
                    <button class="btn btn-warning" onclick="subb_carrito({{$producto->id}})"><span class="fas fa-trash-alt"></span> Quitar del carrito</button>
                </div>
                @else
                    <div class="col-md-6 offset-md-3 text-center">
                        <h6 class="text-danger"><b>* Este producto no esta disponible</b></h6>
                    </div>
                    @endif
                <br>
            </div>
        </div>
        @empty
            <div class="col-md-6 offset-md-3 mt-5 bg-light p-4 text-center">
                <h1><span class="fas fa-box-open text-warning" style="font-size:50px"></span></h1>
                <p><b>NO SE ENCONTRARON PRODUCTOS REGISTRADOS</b></p>
            </div>
        @endforelse
            <div class="col-md-6 offset-md-5 text-center">
                {!! $productos->render() !!}
            </div>
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
