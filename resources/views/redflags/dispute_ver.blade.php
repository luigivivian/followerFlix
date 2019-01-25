@extends('app')

@section('content')
    <div id="conteudo" class="container containerRed">
        <div class="center-align">
            <h4 class="vermelho-txt">Informações</h4>
        </div>
        <?php $d = $disputes;?>
        <?php var_dump($d);?>
        <div class="boxRedFlag">
            <h4 class="center-align">Usuario Reportado</h4>
            <h5>Nome: {{$d->nome_reportado}}</h5>
            <h5>Email: {{$d->email_reportado}}</h5>
            <h5>Descrição:</h5>
            <p>{{$d->descricao}}</p>
            <div class="divider"></div>
            @if($d->arquivo == null)
                <div>
                    <h4 class="center-align vermelho-txt">ARQUIVO NÃO DISPONÍVEL</h4>
                </div>
            @else
                <div class="center-align" >
                    <h5>Arquivo:</h5>
                    <a target="_blank" href="{{ asset('storage/uploads/redflag/'.$d->arquivo) }}" >CLIQUE PARA VISUALIZAR</a>
                </div>
            @endif
            <div class="divider"></div>
            @if($d->status == "Em analise")
                <div class="row mt-1 mb-1">
                    <div class="col s6">
                        <a class="btn btnBlock vermelho" href="{{route('redflag.negar', $id)}}">NEGAR</a>
                    </div>
                    <div class="col l6 s6">
                        <a class="btn btnBlock verde" href="{{route('redflag.aprovar', $id)}}">APROVAR</a>
                    </div>
                </div>
            @else
                <div class="vermelho-txt center-align">
                    <h4>RED FLAG JÁ MODERADA</h4>
                    <p>(Opções de moração indisponiveis)</p>
                </div>
            @endif
            <div class="divisoria">
            </div>

            <div class="disputeMod mt-2">

                <div class="center-align mt-2">
                    <h4>MODERAR DISPUTE</h4>
                </div>

                <div class="center-align" >
                    <h5>Arquivo:</h5>
                    <a target="_blank" href="{{ asset('storage/uploads/dispute/'.$d->arquivoDispute) }}" >CLIQUE PARA VISUALIZAR</a>
                </div>

                <div class="center-align" >
                    <h5>Descrição</h5>
                    <p>{{$d->descricaoDispute}}</p>
                </div>
                <div class="row mb-2">
                    <div class="col s12 l6">
                        <a class="btn vermelho btnBlock mb-1" href="{{route('redflag.dispute.negar', ['id'=> $d->id, 'idredflag'=>$d->id_redflag])}}">NEGAR</a>
                    </div>
                    <div class="col s12 l6">
                        <a class="btn verde btnBlock" href="{{route('redflag.dispute.aprovar', ['id'=> $d->id, 'idredflag'=>$d->id_redflag])}}">APROVAR</a>
                    </div>
                </div>
            </div>
        </div>

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