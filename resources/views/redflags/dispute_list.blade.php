@extends('app')

@section('content')

    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo" class="container containerTable">
        <div class="center-align">
            <h4 class="vermelho-txt">DISPUTES LIST</h4>
            @if(isset($msg))
                <div class="verde-txt">
                    <h5>{{$msg}}</h5>
                </div>
            @endif
        </div>
        @if(count($disputes) > 0)
            <?php var_dump($disputes);?>
            <table class="highlight responsive-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario Dispute</th>
                    <th class="center-align">Opções</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($disputes as $d)
                    <tr>
                        <td>{{$d->id_dispute}}</td>
                        <td>{{$d->nome_pessoal}}</td>
                        <td class="center-align">
                            <a class="btn btn-small azul branco-txt" href="{{route('redflag.dispute.ver', ['iddispute'=>$d->id_dispute])}}"><i class="material-icons">zoom_in</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="divider"></div>
            <div class="center-align">
                <h4>Sem RedFlags para serem moderadas !</h4>
            </div>
            <div class="divider"></div>
        @endif

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