@extends('layouts.app')
@section('content')
    <div class="row">
        @forelse($productos as $producto)
        <div class="col-md-4">
            <div class="card">
                <div class="card-head">

                </div>
                <div class="card-body">

                </div>
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
