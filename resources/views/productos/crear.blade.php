@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 my-5 bg-light p-5 text-left" style="border-radius: 15px">
            <h4 class="text-center text-secondary"><span class="fas fa-plus"></span> Modulo para creación de productos</h4>
            <hr>
            <form class="form col-md-10 offset-md-1" method="POST" action="{{route('productos.guardar')}}" enctype="multipart/form-data">
                @csrf
                <label for="nombre"><span class="fas fa-tags"></span> Nombre del producto</label>
                @error('nombre')
                <p class="text-danger"><b>*Este nombre de producto ya existe</b></p>
                @enderror
                <input type="text" name="nombre" class="form-control" required autocomplete="nombre" value="{{old('nombre')}}">
                    <hr>
                <label for="precio"><span class="fas fa-dollar-sign"></span> Precio del producto</label>
                @error('precio')
                <p class="text-danger"><b>*Este valor no puede ser negativo</b></p>
                @enderror
                <input type="text" name="precio" class="form-control" required autocomplete="precio" value="{{old('precio')}}">
                    <hr>
                <label for="stock"><span class="fas fa-database"></span> Cantidad de producto (Stock)</label>
                @error('stock')
                <p class="text-danger"><b>*Este valor no puede ser negativo</b></p>
                @enderror
                <input type="number" name="stock" min="0" class="form-control" required autocomplete="stock" value="{{old('stock')}}">
                    <hr>
                <label for="descripcion"><span class="fas fa-file-alt"></span> Descripcion</label>
                <textarea class="form-control" name="descripcion">{{old('descripcion')}}</textarea>
                <hr>
                <label for="imagen"><span class="fas fa-image"></span> Imagen del producto</label>
                <input type="file" name="imagen_producto" required>
                @error('imagen_producto')
                <p class="text-danger"><b>* Verfica la extension o el tamaño de la imagen</b></p>
                @enderror
                <hr>
                <button type="submit" class="btn btn-lg btn-info"><span class="fas fa-check"></span> Crear</button>
            </form>
        </div>
    </div>
@endsection
