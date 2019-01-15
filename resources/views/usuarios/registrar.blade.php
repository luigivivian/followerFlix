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
    <div class="center-align"><h3>Cadastre-se</h3></div>
        @if($errors->all())
          <div class="center-align">
            <ul class="vermelho-txt">
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
    @if($error)
        <div class="center-align">
          <p class="vermelho-txt"> {{ $error }}</p>
        </div>
    @endif

        <form class="" method="post" action="{{route ('salvar')}}">
          {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Digite seu Nome" name="nome" id="nome" type="text" class="validate" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Digite seu Sobrenome" name="sobrenome" id="sobrenome" type="text" class="validate" required>
                    <label for="sobrenome">Sobrenome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 l6">
                    <input placeholder="Digite seu Email" name="email" id="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6 l6">
                    <input placeholder="Digite sua data de nascimento" name="dataNascimento" id="dataNascimento" type="date" class="validate" required>
                    <label for="idade">Data Nascimento</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 l12">
                    <label>Genero</label>
                </div>
               <div class="input-field row">
                   <div class="col s6 l6">
                       <p>
                           <label>
                               <input name="genero" value="masculino" type="radio" checked />
                               <span>Masculino</span>
                           </label>
                       </p>
                   </div>
                   <div class="col s6 l6">
                       <p>
                           <label>
                               <input name="genero" value="feminino" type="radio"  />
                               <span>Feminino</span>
                           </label>
                       </p>
                   </div>
               </div>
            </div>


            <div class="row">
                <div class="input-field col s12 l12">
                    <input placeholder="Digite seu login" name="login" id="login" type="text" class="validate" required>
                    <label for="login">Login</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 l6">
                    <input placeholder="Digite sua senha" name="senha" id="senha" type="password" class="validate" required>
                    <label for="senha">Senha</label>
                </div>
                <div class="input-field col s6 l6">
                    <input placeholder="Confirme a senha" name="senhaConfirma" id="senhaConfirma" type="password" class="validate" required>
                    <label for="senhaConfirma">Confirmar Senha</label>
                </div>
            </div>

          <div class="input-field">
            <div class="col s12 l4">
              <button type="button" onclick="window.location='{{ route("login") }}'" class="btn red">Cancelar</button>
              <button type="submit" class="waves-effect waves-light btn">Registrar</button>
            </div>
          </div>
        </form>
</div>




<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>






</body>

</html>
