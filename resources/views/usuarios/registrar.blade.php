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
    @if(isset($error))
        <div class="center-align">
          <p class="vermelho-txt"> {{ $error }}</p>
        </div>
    @endif


        <form class="" method="post" action="{{route ('salvar')}}">
          {{ csrf_field() }}
            @if(isset($token) && isset($id_usuario_pai))

                <input name="id_usuario_pai" type="number" hidden value="{{$id_usuario_pai}}">
                <input name="tokenConvite" type="text" hidden value="{{$token->token}}">
            @endif
            <div class="row">
                <div class="input-field col s12 l6">
                    <input placeholder="Digite seu Nome completo" name="nome" id="nome" type="text" class="validate" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12 l6">
                    <input placeholder="Digite seu login" name="login" id="login" type="text" class="validate" required>
                    <label for="login">Login</label>
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

                <div class="input-field col s12 l2">
                    <select name="idade" required>
                        <option value="" disabled selected>Idade</option>
                        <option value="15">15-20</option>
                        <option value="21">21-25</option>
                        <option value="26">26-30</option>
                        <option value="31">31-35</option>
                        <option value="40">36-40</option>
                        <option value="41">41-45</option>
                        <option value="46">46-50</option>
                    </select>
                    <label>Idade</label>
                </div>
                <div class="input-field col s12 l2">
                    <select required name="genero">
                        <option value="" disabled selected>Genero</option>
                        <option value="masculino" >Masculino</option>
                        <option value="feminino" >Feminino</option>
                    </select>
                    <label>Selecione seu genero</label>
                </div>
                <div class="input-field col s12 l2">
                    <select name="interesse">
                        <option value="" disabled selected>Interesses</option>
                        <option value="musica">Musica</option>
                        <option value="tecnologia">Tecnologia</option>
                        <option value="carros">Carros</option>
                        <option value="esportes">Esportes</option>
                        <option value="filmes">Filmes</option>
                        <option value="moda">Moda</option>
                    </select>
                    <label>Interesse</label>
                </div>
                <div class="input-field col s12 l2">
                    <select name="prestacao_servico" required>
                        <option value="" disabled selected>Rede Social</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="youtube">Youtube</option>
                        <option value="website">Website</option>
                    </select>
                    <label>Prestar engajamento</label>
                </div>
                <div class="input-field col s12 l2">
                    <select name="contratacao_servico" required>
                        <option value="" disabled selected>Rede Social</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="youtube">Youtube</option>
                        <option value="website">Website</option>
                    </select>
                    <label>Receber engajamento</label>
                </div>
                <div class="input-field col s12 l2">
                    <select name="metodoPagamento" required>
                        <option value="" disabled selected>Pagamento</option>
                        <option value="pagseguro">Pagseguro</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    <label>Metodo pagamento</label>
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



<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>


</body>

</html>
