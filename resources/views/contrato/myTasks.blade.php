@extends('app')

@section('content')


    <div id="conteudo">
        <div class="center-align vermelho-txt">
            <h4> Get More Professional Followers</h4>
        </div>
        <?php var_dump($myTasks)?>
       @if(count($myTasks) > 0)
            <div class="container containerTasks">
                <div class="row">
                    <div>
                        <div class="col s4 l6">
                            <div>
                                <h5> Cliente</h5>
                            </div>
                        </div>
                        <div class="col s4 l4">
                            <div>
                                <h5> Tarefa</h5>
                            </div>
                        </div>
                    </div>
                </div>
           @foreach($myTasks as $t)
                    <ul class="collection">
                        <li class="collection-item dismissable">
                            <div class="row">
                                <div style="margin-top: 2%;">
                                    <div class="col s4 l2">
                                        <div>
                                            <img class="circle" src="{{asset('storage/uploads/avatar/avatarDefault.png')}}">
                                        </div>
                                    </div>
                                    <div class="col s4 l4">
                                        <div style="margin-top: 5%;">
                                            <h5 class="mt-2">{{$t->nome}}</h5>
                                        </div>
                                    </div>
                                    <div class="col s4 l4">
                                        <div style="margin-top: 5%;">
                                            <p class="mt-2">Engajamento: {{$t->contratacao_servico}}</p>
                                        </div>
                                    </div>
                                    <div class="col s4 l2" style="margin-top: 2%;">
                                        <a href="#!" class="secondary-content"><i class="material-icons">send</i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
           @endforeach
       @endif
    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>

        $(document).ready(function(){

        });
    </script>
@endsection