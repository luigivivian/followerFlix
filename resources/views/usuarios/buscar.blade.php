@extends('app')

@section('content')


    <div id="conteudo">
            <div class="center-align vermelho-txt">
               <h4> Get More Professional Followers</h4>
            </div>
        @if(session()->get('usuarioAtivo') == false)
            <div class="col s12 m6 l12 cardBotoes card">
                <div class="card-content center-align">
                    <div class="center-align">
                        <h5 class="vermelho2-txt">VOCÊ ESTÁ INATIVO</h5>
                        <h5 class="">Você precisa ativar sua conta para contratar e ser contratado</h5>
                        <a class="btn verde" href="{{route('ativarconta')}}">ATIVAR CONTA</a>
                    </div>
                </div>
            </div>
        @endif

        @if(session()->get('usuarioAtivo') == true)
        <div id="acessoPadrao">
            @if(isset($teste))
            @foreach($teste as $u)
                <p>{{$u->nome}}</p>
                @endforeach
            @endif
        </div>

        <div id="acessoPro">
            {!! Form::open(['route' => ["user.search"], 'method'=>'get', 'novalidate']) !!}
                {{  csrf_field() }}
            <div class="input-group col s12 l6">
                <div class="input-field">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="search" name='procurar'>
                    <label for="search">Procure por nome ou email</label>
                </div>
                <button type="submit" class="input-group-addon btn btn-flat">SEARCH</button>
            </div>
            {!! Form::close() !!}

            <div class="card cardDados" style="height: 400px;">
                <div class="card-content darkgrey-text center-align">
                    {!! Form::open(['route' => ["user.filter"], 'method'=>'get']) !!}
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <select name="idade" required>
                                <option value="" disabled>Idade</option>
                                <option value="15" >15-20</option>
                                <option value="21">21-25</option>
                                <option value="26">26-30</option>
                                <option value="31">31-35</option>
                                <option value="40">36-40</option>
                                <option value="41">41-45</option>
                                <option value="46">46-50</option>
                            </select>
                            <label>Idade</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select required name="genero">
                                <option value="" disabled>Genero</option>
                                <option value="masculino" >Masculino</option>
                                <option value="feminino" >Feminino</option>
                            </select>
                            <label>Selecione seu genero</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select name="interesse" required>
                                <option value="" disabled>Interesses</option>
                                <option value="musica">Musica</option>
                                <option value="tecnologia">Tecnologia</option>
                                <option value="carros">Carros</option>
                                <option value="esportes">Esportes</option>
                                <option value="filmes">Filmes</option>
                                <option value="moda">Moda</option>
                            </select>
                            <label>Interesse</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select name="prestacao_servico" required>
                                <option value="" disabled>Rede Social</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="youtube">Youtube</option>
                                <option value="website">Website</option>
                            </select>
                            <label>Prestar engajamento</label>
                        </div>
                    </div>
                    <div class="card-action center-align">
                        <button class="btn verde branco-txt">FILTRAR</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endif
    </div>

<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
<script>
   $(document).ready(function(){
       $('select').formSelect();
   });
</script>
@endsection