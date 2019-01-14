<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.css') }}">

    <!-- HELPERS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylera.css') }}">
    <title>Autenticação</title>
</head>
<body>

<div id="app">

    <topo logo="{{ asset('/imgs/logo.png') }}" sair="{{route('logout')}}" perfil="{{route('myProfile')}}"></topo>

    <div id="page-content-wrapper">
        <div id="page-content">

            <div class="container">
                @yield('content')
            </div>
        </div>

    </div>

</div>

<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>

</body>

</html>