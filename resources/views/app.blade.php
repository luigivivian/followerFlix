<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.css') }}">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- HELPERS -->

    {{--CSS LINKS--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylera.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/contratoCSS/contratoStyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/usuarioCSS/usuario.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/redFlags/redflag.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsividade/responsividade.css') }}">



    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
    <title>Builder All</title>
</head>
<style>

    body {
        font-family: 'Lato', sans-serif !important;
    }
</style>
<body>

<div id="app" style="margin-top: 0px; !important;" class="container-fluid">
    @inject('e', 'App\Enums\Enuns')
    <div id="lateralMenu">
        <ul id="dropdown1" class="dropdown-content ">
            <li class="divider"></li>
            <li class="divider"></li>
            <li><a href="#!" class="red-text text-lighten-1">ACCOUNT</a></li>
            <li><a href="#!" class="red-text text-lighten-1">two</a></li>
            <li><a class="red-text text-lighten-1" href="{{route('logout')}}">LOGOUT</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="{{route('logout')}}">SAIR: {{session()->get('user')->nome}} </a>
                <ul class="right hide-on-med-and-down">
                    <li><a data-target="dropdown1" class="dropdown-trigger red-text text-lighten-1"> {{session()->get('user')->nome}}<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li>
                        <a class="red-text text-lighten-1" href="#!">
                            <div class="circle">
                                <img style="" href="{{route('myprofile')}}" src="{{ asset('storage/uploads/avatar/'.session()->get('user')->avatar_img) }}">
                            </div>
                        </a>
                    </li>
                </ul>
                </ul>
            </div>
        </nav>

        <ul id="slide-out" class="sidenav sidenav-fixed">
            <div> <img style="width: 80%; height: 80%;" src="{{asset('imgs/logo.png')}}"> </div>
            <li><a href="{{route('dashboard')}}">HOME</a></li>
            <li><a href="#!">TUTORIALS</a></li>
            <li><a href="{{route('getprofissional')}}">GET MORE PROFESSIONALS</a></li>
            <li><a href="#!">CLIENTE / TAREFA</a></li>
            <li><a href="#!">YOUR DOWNLINE</a></li>
            <li><a href="{{route('redflag.visualizar', session()->get('user')->id)}}">RED FLAG</a></li>
            <li><a href="{{route('myprofile')}}">YOUR ACCOUNT</a></li>
            <li><a href="#!">SUPPORT</a></li>
            <li><a href="#!">CALCULATOR</a></li>
            <li><a href="#!">YOUR PAYMENTS</a></li>
        </ul>
    </div>

    <div>
            <div>
                @yield('content')
            </div>
        <footer id="footer" class="center-align">
                <h5>Rodapé</h5>
        </footer>
    </div>





</div>

<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>

<script>
    $(document).ready(function(){
            $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown(
            {
                inDuration: 300,
                outDuration: 225,

                belowOrigin: true, // Displays dropdown below the button
                alignment: 'right' // Displays dropdown with edge aligned to the left of button
            }
        );
    });

</script>
</body>

</html>