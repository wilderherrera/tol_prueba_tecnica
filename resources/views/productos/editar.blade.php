@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 bg-light p-4 text-center">
            <form class="form" action="{{route('productos.actualizar',$producto_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="nombre"><span class="fas fa-tags"></span> Nombre del producto</label>
                <input type="text" name="nombre" class="form-control" required autocomplete="nombre" value="{{$producto->nombre}}">

                <label for="precio"><span class="fas fa-dollar-sign"></span> Precio del producto</label>
                <input type="text" name="precio" class="form-control" required autocomplete="precio" value="{{$producto->precio}}">

                <label for="stock"><span class="fas fa-database"></span> Cantidad de producto (Stock)</label>
                <input type="number" name="stock" min="0" class="form-control" required autocomplete="stock" value="{{$producto->stock}}">

                <label for="descripcion"><span class="fas fa-file-alt"></span> Descripcion</label>
                <textarea class="form-control" name="descripcion">{{$producto->descripcion}}</textarea>

                <label for="imagen_producto"><span class="fas fa-image"></span> Imagen del producto</label>
                <input type="file" name="imagen_producto">
                @error('imagen_producto')
                <p class="text-danger"><b>* Verfica la extension o el tamaño de la imagen</b></p>
                @enderror

                <button class="btn btn-lg btn-info"><span class="fas fa-check"></span> Actualizar</button>
            </form>
        </div>
    </div>
@endsection
