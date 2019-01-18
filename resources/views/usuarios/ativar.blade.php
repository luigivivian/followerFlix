
@extends('app')

@section('content')
    <div id="conteudo">
        <div class="row">
            {!! Form::open(['route' => ["comprarativacao", session()->get('user')->id], 'method'=>'post']) !!}
            {{  csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input name="conta" required placeholder="Digite o numero da conta" id="disabled" type="text" class="validate">
                        <label for="disabled">Numero da conta</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input disabled required name="conta" value="$ 10" id="disabled" type="text" class="validate">
                        <label for="disabled">Valor Total</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input disabled required name="ativacao" value="30 DIAS DE ATIVAÇÃO" id="ativacao" type="text" class="validate">
                        <label for="ativacao">Ativação</label>
                    </div>
                </div>
            <div class="input-field col s12 l12 center-align">
                <button type="submit" class="verde btn btn-small">Confirmar compra</button>
                {{--{!! Form::submit('Submit', ['class' => 'btn form-control']) !!}--}}
            </div>

            {!! Form::close() !!}
        </div>
        <a href="{{route('confirmarativacao')}}" class="verde btn btn-small">Confirmar compra</a>
    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>

        $(document).ready(function(){
            $('.modal').modal();
            $('select').formSelect();
        });
    </script>
@endsection