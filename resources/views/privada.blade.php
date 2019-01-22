
@extends('app')

@section('content')
<div id="conteudo">
    <div class="row">
        <div>
            @if(session()->get('usuarioAtivo') == false)
                <div class="col s12 m6 l12 cardBotoes card">
                    <div class="card-content center-align">
                        <div class="center-align">
                            <h5 class="vermelho2-txt">VOCÊ ESTÁ INATIVO</h5>
                            <h5 class="">Você precisa ativar sua conta para contratar e ser contratado</h5>
                            <a class="btn verde" href="{{route('ativarconta')}}">ATIVAR CONTA</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if(session()->get('usuarioAtivo') == true)
            <div class="center-align vermelho-txt">
                <h4>Seus contratos</h4>
            </div>
        <div class="row col s12 m12 l12"> <!--1st row containing 2 cards-->
            <?php $count = 1;?>
            @foreach($contratos as $u)
                <?php
                    switch (strtoupper($u->status)) {
                        case 'PENDENTE':
                            $corStatus = 'status-pendente';
                            break;
                        case 'ATIVO':
                            $corStatus = 'status-ativo';
                            break;
                        case 'INATIVO':
                            $corStatus = 'status-inativo';
                            break;
                    }
                ?>
                @if($count <= 4)

                    <div class="col s12 m6 l3 card" onclick="visualizarContrato('<?= $u->idcontrato?>')">
                        <div class="card-content center-align">
                            <div>
                                <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                            </div>
                            <div class="center-align">
                                <h5 class="">{{$u->nome}}</h5>
                                <p>{{$u->email}}</p>
                                <p class="status <?=$corStatus;?>">{{strtoupper($u->status)}}</p>
                                <br>
                                <p class="status verde">Clique para visualizar</p>
                            </div>
                        </div>
                    </div>
                        <?php $count++;?>
                @else
                        <div class="col s12 m6 l3 card cardOPT cardInvisivel" onclick="visualizarContrato('<?= $u->idcontrato?>')">
                            <div class="card-content center-align">
                                <div>
                                    <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                                </div>
                                <div class="center-align">
                                    <h5 class="">{{$u->nome}}</h5>
                                    <p>{{$u->email}}</p>
                                    <p class="status <?=$corStatus;?>">{{strtoupper($u->status)}}</p>
                                    <br>
                                    <p class="status verde">Clique para visualizar</p>
                                </div>
                            </div>
                        </div>
                @endif
            @endforeach
           <div id="mostrarCards" class="right-align">
               <a onclick="showContratos(1);" style="cursor: pointer;">Show All</a>
           </div>
        </div>

    </div>

    <div class="row center-align">
        <div class="col s12 l6">
            <button class="btn vermelho branco-txt">CONTRATAR</button>
        </div>

        <div class="col s12 l6">
            <a class="waves-effect waves-light btn vermelho branco-txt modal-trigger" href="#modalLink">LINK CONVITE</a>
        </div>
    </div>
    <div class="cardBotoes center-align">

    </div>
    {{--Modal convite--}}
    <div id="modalLink" class="modal">
        <div class="modal-content center-align">
            <h5>Seu link de convite</h5>
            <h5>Copie e compartilhe para convidar novos membros</h5>
            <p>{{url('/registrar/'.session()->get('user')->token)}}</p>
        </div>

    </div>
    {{--Fim modal convite--}}
    @endif

</div>

<script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

<script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
<script>
    function showContratos(opt){
        if(opt == 1){
            $(".cardOPT").removeClass("cardInvisivel");
            $('#mostrarCards').html('<a onclick="showContratos(0);" style="cursor: pointer;">Hide All<a>');
        }else if(opt == 0){
            $(".cardOPT").addClass("cardInvisivel");
            $('#mostrarCards').html('<a onclick="showContratos(1);" style="cursor: pointer;">Show All<a>');

        }

    }
    function visualizarContrato(id){
        console.log(id);
        window.location.href = 'contrato/'+id+'/visualizar'; //using a named route
    }
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
    });
</script>
@endsection