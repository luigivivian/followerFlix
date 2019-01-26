@extends('app')

@section('content')
    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo">
        <div class="center-align">
            <h4 class="vermelho-txt">TUTORIAIS</h4>
            <div class="container center-align">
                <a class="btn btnBlock verde" href="{{route('tutorial.new')}}">NOVO TUTORIAL</a>
            </div>
            @if(isset($msg))
                <div>
                    <h4>{{$msg}}</h4>
                </div>
            @endif
            @if(isset($msg))
                <div class="verde-txt">
                    <h5>{{$msg}}</h5>
                </div>
            @endif
            @if(count($tutorials) > 0)
                <div class="col s12 l12">
                    <div class="row">
                        @foreach($tutorials as $t)
                         <div class="col s12 l4">
                             <div>
                                 <h5>{{$t->titulo}}</h5>
                                 <iframe src="{{$t->src}}" frameborder="0" allow="" allowfullscreen></iframe>
                                 <p>{{$t->descricao}}</p>
                             </div>
                             {{--IF HAS PERMISSION LIBERA EDIÇÃO--}}
                             @if(session()->get('user')->tipoUsuario == \App\Enums\Enuns::admin)
                                 <div class="center-align mt-1 mb-2">
                                     <a class="btn amarelo btn-small" href="{{route('tutorial.edit', $t->id)}}">EDITAR VIDEO</a>
                                     <a onclick="return confirm('Deseja mesmo excluir?');"class="btn vermelho btn-small" href="{{route('tutorial.delete', $t->id)}}">DELETAR</a>
                                 </div>
                             @endif
                         </div>
                        @endforeach
                    </div>
                </div>
            @endif
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