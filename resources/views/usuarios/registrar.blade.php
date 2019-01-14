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
          <div class="container alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="form-horizontal" method="post" action="{{route ('salvar')}}">
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
                    <input placeholder="Digite seu Email" name="email" id="email" type="text" class="validate" required>
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
                               <input name="group1" type="radio" checked />
                               <span>Masculino</span>
                           </label>
                       </p>
                   </div>
                   <div class="col s6 l6">
                       <p>
                           <label>
                               <input name="group1" type="radio"  />
                               <span>Feminino</span>
                           </label>
                       </p>
                   </div>
               </div>

            </div>

          <div class="input-field">
            <div class="col s12 l4">
              <label for="login">Login</label>
              <input type="text" class="input-field" name="login" placeholder="Digite seu login">
            </div>
          </div>

          <div class="input-field">
            <div class="col s12 l4">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
            </div>
          </div>
          <div class="input-field">
            <div class="col s12 l4">
              <a href="{{route('login')}}" type="reset" class="btn">Cancelar</a>
              <button type="submit" class="btn">Registrar</button>
            </div>
          </div>
        </form>
</div>




<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>






</body>

</html>
