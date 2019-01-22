
@extends('app')

@section('content')
    <div id="conteudo">
        <h3>teste</h3>
        <h5><?= var_dump($contrato)?></h5>

        @if(isset($contrato))


        @endif
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