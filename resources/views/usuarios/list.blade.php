@extends('app')

@section('content')


    <div id="conteudo">
        <div class="center-align vermelho-txt">
            <h4> Get More Professional Followers</h4>
        </div>

       @if(count($users) > 1)
            <div id="acessoPadrao">
                <div class="row col s12 m12 l12"> <!--1st row containing 2 cards-->
                    @foreach($users as $u)
                        <div class="col s12 m6 l3 card">
                            <div class="card-content center-align">
                                <div>
                                    <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                                </div>
                                <div class="center-align">
                                    <h5 class="">{{$u->nome}}</h5>
                                    <p>{{$u->email}}</p>
                                    <button class="btn verde btn-small">Visualizar</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
       @else
           <div class="center-align">
               <h4>Perfil com essas caracteristicas não encontrado</h4>
           </div>
       @endif

    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection