<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('images')}}/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c6786b8721.js" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- Styles -->


</head>
<body class="bg-secondary">
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @section('header')
            <div class="col-md-12 bg-dark" id="header">
                <nav class="navbar navbar-expand-lg navbar-white">
                    <a class="navbar-brand text-white" href="{{route('tienda')}}">Tienda Tol</a>

                    <div class="col-md-10 text-right">
                        @if(Auth::check())
                            <table align="right">
                                <tr>
                                    <td><a href="{{route('perfil')}}" class="text-right text-white"><span style="color:#282e3d" class="fas fa-user text-light"></span><b> {{Auth::user()->nombre}}</b></a></td>
                                    <td><form method="post" action="{{route('logout')}}">
                                            @csrf
                                            <button style="background-color: transparent;border-width:0 " class="text-info btn btn-light"><span class="fas fa-times"></span> Cerrar session</button>
                                        </form></td>

                                </tr>
                            </table>
                        @else
                            <a href="{{route('login')}}"><span class="fa fa-door-closed"></span> Ingresar</a>
                        @endif

                    </div>

                        <a href="{{route('orden')}}"><span class="fas fa-shopping-cart"></span><p id="carrito_conteo" class="text-info" style="font-weight: bold"></a>

                </nav>
            </div>
            @show

        <div clas="row">

            @yield('content')
        </div>
@section('javascript')
    @show
</body>
</html>
