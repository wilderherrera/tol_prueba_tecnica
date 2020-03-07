@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu correo electronico</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuevo enlace de restauración se ha enviado a tu correo
                        </div>
                    @endif

                    Por favor revisa tu correo electronico te enviamos un link de restauración
                    Si no recibes este email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Reenviame el enlace</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
