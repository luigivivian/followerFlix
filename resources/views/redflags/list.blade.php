@extends('app')

@section('content')
    <div id="conteudo" class="container containerTable">
        <div class="center-align">
            <h4 class="vermelho-txt">Red Flags</h4>
        </div>


        <table class="highlight responsive-table">
            <thead>
            <tr>
                <th>Usuario</th>
                <th>Usuario Reportado</th>
                <th class="center-align">Opções</th>
            </tr>
            </thead>

            <tbody>
            <?=var_dump($redflags)?>
            @foreach ($redflags as $r)
                <tr>
                    <td>{{$r->nome_pessoal}}</td>
                    <td>{{$r->nome_reportado}}</td>
                    <td class="center-align">
                        <a class="btn btn-small azul branco-txt" href="{{route('redflag.analisar', $r->id)}}"><i class="material-icons">zoom_in</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


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