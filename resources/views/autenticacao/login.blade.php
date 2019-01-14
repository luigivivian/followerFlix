<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.css') }}">

    <!-- HELPERS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylera.css') }}">


    <title>Autenticação</title>
</head>
<body>

<div class="container">
    <div class="panel-heading text-center mrg20T"><h3>Entrar no sistema</h3></div>

    <div class="center-vertical">
        <div class="center-content">
                <div class="panel-body">
                    <div>
                        @if(isset($error))
                            <div class="mrg20T center-margin col-sm-4 text-center">
                                <div class="example-box-wrapper">
                                    <div class="content-box border-top border-red">
                                        <p class="clearfix">
                                            {{$error}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <form class="form-horizontal center-margin col-md-4" method="post" action="{{ route('logar') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="login" class="col-sm-1 control-label">Login</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="login"
                                       placeholder="Digite seu login">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="senha" class="col-sm-1 control-label">Senha</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="senha"
                                       placeholder="Digite seu senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="reset" class="btn btn-default">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>






</body>

</html>
