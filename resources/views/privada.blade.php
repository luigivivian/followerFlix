@extends('app')

@section('content')
    <div id="conteudo">
        <div class="row">

            @if(session()->get('usuarioAtivo') == false && session()->get('user')->lider == 0)
                <div>
                    <div class="col s12 m6 l12 cardBotoes card">
                        <div class="card-content center-align">
                            <div class="center-align">
                                <h5 class="vermelho2-txt">VOCÊ ESTÁ INATIVO</h5>
                                <h5 class="">Você precisa ativar sua conta para contratar e ser contratado</h5>
                                <a class="btn verde" href="{{route('ativarconta')}}">ATIVAR CONTA</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(session()->get('usuarioAtivo') == true || session()->get('user')->lider == 1)
                @if(session()->get('user')->lider == 1)
                        <div class="center-align vermelho-txt">
                            <h4>Você não possui contratos</h4>
                        </div>
                @else
                        <div class="center-align vermelho-txt">
                            <h4>Seus contratos</h4>
                            <p>Os 10 primeiros contratos são obrigatórios</p>
                        </div>
                @endif

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
                                        @if($u->avatar_img != null)
                                            <img class="avatar" src="{{asset('storage/uploads/avatar/'.$u->avatar_img)}}">
                                        @else
                                            <img class="avatar" src="{{asset('storage/uploads/avatar/avatarDefault.png')}}">
                                        @endif
                                    </div>
                                    <div class="center-align">
                                        <h5 class="">{{$u->nome_prestante}}</h5>
                                        <p>{{$u->email_prestante}}</p>
                                        <p class="status <?=$corStatus;?>">{{strtoupper($u->status)}}</p>
                                        <br>
                                        <p class="status verde">Clique para visualizar</p>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;?>
                        @else
                            <div class="col s12 m6 l3 card cardOPT cardInvisivel"
                                 onclick="visualizarContrato('<?= $u->idcontrato?>')">
                                <div class="card-content center-align">
                                    <div>
                                        @if($u->avatar_img != null)
                                            <img class="avatar" src="{{asset('storage/uploads/avatar/'.$u->avatar_img)}}">
                                        @else
                                            <img class="avatar" src="{{asset('storage/uploads/avatar/avatarDefault.png')}}">
                                        @endif
                                    </div>
                                    <div class="center-align">
                                        <h5 class="">{{$u->nome_prestante}}</h5>
                                        <p>{{$u->email_prestante}}</p>
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
        @if(session()->get('user')->lider == 1)
            <div class="row center-align">
                <div class="col s12 l12">
                    <a class="waves-effect waves-light btn vermelho branco-txt modal-trigger" href="#modalLink">LINK ESPECIAL CONVITE</a>
                </div>
            </div>
        @else
            <div class="row center-align">
                <div class="col s12 l6">
                    <button class="btn vermelho branco-txt">CONTRATAR</button>
                </div>
                <div class="col s12 l6">
                    <a class="waves-effect waves-light btn vermelho branco-txt modal-trigger" href="#modalLink">LINK CONVITE</a>
                </div>
            </div>
        @endif

        <div class="cardBotoes center-align">

        </div>
        <div class="row">
            <div class="col s12 l12 mt-3">
                <div class="row">
                    <div class="col s12 center-align">
                        <div class="boxTotalContratos col s12 l4">
                            <h5>CONTRATOS ATIVOS</h5>
                            <h4>{{$totalContratosAtivos}}</h4>
                        </div>
                        <div class="boxTotalContratos col s12 l4">
                            <h5>RENDA PREVISTA</h5>
                            <h4>$ {{$renda_prevista}}</h4>
                        </div>
                        <div class="boxTotalContratos col s12 l4">
                            <h5>TOTAL RECEBIDO</h5>
                            <h4>$ {{$total_tarefas * 5}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l12 center-align">
                            <div class="col s12 l6">
                                <p>Milestone 1 - You have 3 active clients, and you page will be recommend up to your
                                    5th level</p>
                            </div>
                            <div class="col s12 l6">
                                <p>Milestone 2 - You have 10 active clients, and you page will be recommend up to your
                                    10th level</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 l12 center-align mt-2">
                            <iframe class="frameInicio" src="https://youtube.com/embed/o3WdLtpWM_c" frameborder="0"
                                    allow="" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--Modal convite--}}
        <div id="modalLink" class="modal">
            <div class="modal-content center-align">
                @if(session()->get('user')->lider == 1)
                    <h5>Copie e compartilhe para convidar novos membros</h5>
                    <p class="verde-txt"><b>{{url('/registrar/'.$tokenLider)}}</b></p>
                @else
                    @if($totalContratosAtivos >= 10)
                        <h5>Seu link de convite</h5>
                        <h5>Copie e compartilhe para convidar novos membros</h5>
                        <p>{{url('/registrar/'.session()->get('user')->token)}}</p>
                    @else
                        <h5 class="vermelho-txt">Você precisa ter 10 contratos ativos para convidar</h5>
                    @endif
                @endif

            </div>

        </div>
        {{--Fim modal convite--}}
        @endif

    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>
    <script>
        function showContratos(opt) {
            if (opt == 1) {
                $(".cardOPT").removeClass("cardInvisivel");
                $('#mostrarCards').html('<a onclick="showContratos(0);" style="cursor: pointer;">Hide All<a>');
            } else if (opt == 0) {
                $(".cardOPT").addClass("cardInvisivel");
                $('#mostrarCards').html('<a onclick="showContratos(1);" style="cursor: pointer;">Show All<a>');

            }

        }

        function visualizarContrato(id) {
            console.log(id);
            window.location.href = 'contrato/' + id + '/visualizar'; //using a named route
        }

        $(document).ready(function () {
            $('.modal').modal();
            $('select').formSelect();
        });
    </script>
@endsection