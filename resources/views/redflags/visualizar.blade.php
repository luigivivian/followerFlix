@extends('app')

@section('content')
    <div id="conteudo" class="container containerTable">
        <div class="center-align">
            <h4 class="vermelho-txt">Informações</h4>
        </div>
        <?php var_dump($redflag)?>

    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.modal').modal();
            $('select').formSelect();
        });
    </script>
@endsection