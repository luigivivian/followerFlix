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
<style>
    .row .col{
        float: none !important;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>

<div class="container">
    <div class="center-align"><h3>Entrar no sistema</h3></div>

                <div class="painelLogin">
                    <div>
                        @if(isset($error))
                            <div class="center-align">
                                    <div class="vermelho-txt">
                                        <p class="clearfix">
                                            {{$error}}
                                        </p>
                                    </div>
                            </div>
                        @endif
                    </div>
                    @if(isset($msg))
                        <div class="center-align">
                            <div class="verde-txt">
                                <p class="clearfix">
                                    {{$msg}}
                                </p>
                            </div>
                        </div>
                    @endif


                        <form class="row col s12 l4" method="post" action="{{ route('logar') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12 l4">
                                    <label for="login">Login</label>
                                    <input type="text" class="validate" name="login"
                                           placeholder="Digite seu login">
                                </div>
                            </div>

                           <div class="row">
                               <div class="input-field col s12 l4">
                                   <label for="senha" class="col-sm-1 control-label">Senha</label>
                                   <input type="password" class="form-control" name="senha"
                                          placeholder="Digite seu senha">
                               </div>
                           </div>
                            <div class="col s12 l4">
                                    <button type="reset" class="btn red">Cancelar</button>
                                    <button type="submit" class="btn">Entrar</button>
                            </div>
                        </form>
                </div>

</div>


<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>






</body>

</html>
