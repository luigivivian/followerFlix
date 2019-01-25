@extends('app')

@section('content')
    <div id="conteudo" class="container containerRed">
        <div class="center-align">
            <h4 class="vermelho-txt">Informações</h4>
        </div>
        <?php  $r = $redflag[0];?>
        <div class="boxRedFlag">
                <h4 class="center-align">Usuario Reportado</h4>
                <h5>Nome: {{$r->nome_reportado}}</h5>
                <h5>Email: {{$r->email_reportado}}</h5>
                <h5>Descrição:</h5>
                <p>{{$r->descricao}}</p>
            <div class="divider"></div>
                <h4 class="center-align">Usuario Criador da redflag</h4>
                <h5>Nome: {{$r->nome_pessoal}}</h5>
                <h5>Email: {{$r->email_pessoal}}</h5>
            @if($r->arquivo == null)
                <div>
                    <h4 class="center-align vermelho-txt">ARQUIVO NÃO DISPONÍVEL</h4>
                </div>
            @else
                <div class="center-align" >
                    <h5>Arquivo:</h5>
                    <a target="_blank" href="{{ asset('storage/uploads/redflag/'.$r->arquivo) }}" >CLIQUE PARA VISUALIZAR</a>
                </div>
            @endif
            <div class="divider"></div>
            @if($r->status == "Em analise")
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