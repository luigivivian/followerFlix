@extends('app')

@section('content')


    <div id="conteudo">
            <div class="center-align vermelho-txt">
               <h4> Get More Professional Followers</h4>
            </div>

        <div id="acessoPadrao">
            @foreach($teste as $u)
                <p>{{$u->nome}}</p>
                @endforeach

        </div>

        <div id="acessoPro">
            {!! Form::open(['route' => ["user.buscar"], 'method'=>'get', 'novalidate']) !!}
                {{  csrf_field() }}
            <div class="input-group col s12 l6">
                <div class="input-field">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="search" name='procurar'>
                </div>
                <button type="submit" class="input-group-addon btn btn-flat">SEARCH</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
<script>
   $(document).ready(function(){

   });
</script>
@endsection