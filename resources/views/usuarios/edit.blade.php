@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3>Editar informações do perfil</h3></div>
    <div class="panel-body row">
    <div class="col-4">

    </div>

      <div class="col-4 align-self-center">

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
          <div class="form-group">

            <div class="col-sm-10">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
            </div>
          </div>
          <div class="form-group">

            <div class="col-sm-10">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Digite seu email">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label for="login">Login</label>
              <input type="text" class="form-control" name="login" placeholder="Digite seu login">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <a href="{{route('login')}}" type="reset" class="btn btn-default">Cancelar</a>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-4">

      </div>
    </div>
  </div>

  @endsection