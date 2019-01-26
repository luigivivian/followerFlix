@extends('app')

@section('content')
    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo">
        <div class="center-align">
            <h4 class="vermelho-txt">TUTORIAIS</h4>
            <div class="col s12 container">
            @if($newTutorial == true)
                {!! Form::open(['route' => ["tutorial.newPost"],   'method'=>'post']) !!}
                    {{  csrf_field() }}
            @else
                <?php
                        if(isset($tutorial)){
                            $t = $tutorial[0];
                            $id = $tutorial[0]->id;
                        }
                ?>
                {!! Form::open(['route' => ["tutorial.editPost" , $id], 'method'=>'post']) !!}
                {{  csrf_field() }}
            @endif
                <div class="row">
                    <div class="ml-01">
                        <h5 class="center-align">Adicione novo tutorial !</h5>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Titulo do tutorial" id="titulo" value="{{isset($t->titulo) ? $t->titulo : ""}}" name="titulo" type="text" class="validate" required>
                        <label for="nome">Titulo do tutorial</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="SRC" id="src" value="{{isset($t->src) ? $t->src : ""}}" name="src" type="text" class="validate" required>
                        <label for="src">SRC (link do video)</label>
                    </div>
                </div>

                <div class="row">
                    <div class="ml-01">
                        <h5 class="center-align">Breve descrição</h5>
                    </div>
                    <div class="input-field col s12">
                        <input placeholder="Descreva o video brevemente"value="{{isset($t->descricao) ? $t->descricao : ""}}" id="descricao" name="descricao" type="text" class="validate" required>
                        <label for="descricao">Breve descrição</label>
                    </div>

                </div>
                <div>
                    <button type="submit" class="btn btnBlock vermelho mt-1 mb-2">ENVIAR</button>
                </div>
                {!! Form::close() !!}
                {{--Fim formulario--}}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.modal').modal();
        });
    </script>
@endsection