@extends('app')

@section('content')

    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo">
        <div class="center-align">
            <h4 class="vermelho-txt">TUTORIAIS</h4>
            @if(isset($msg))
                <div class="verde-txt">
                    <h5>{{$msg}}</h5>
                </div>
            @endif
            @if(count($tutorials) > 0)
                <div class="row">
                    @foreach($tutorials as $t)
                        <div class="col s12 l4">
                            <div class="ml-1 mr-1">
                                <h5>{{$t->titulo}}</h5>
                                <iframe src="{{$t->src}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
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