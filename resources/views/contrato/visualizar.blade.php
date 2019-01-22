
@extends('app')

@section('content')
    <div id="conteudo">

        <h5><?= var_dump($contrato)?></h5>
        <?php $c = $contrato[0];?>
        @if(isset($contrato))
            <div class="row">
                <div class="col l6 s10 ajusteCenter">
                    <div class="boxContrato left-align">
                       <div class="row">
                            <div class="col offset-l4">
                                <img class="avatarPerfil" src="{{ asset('storage/uploads/avatar/'.session()->get('user')->avatar_img) }}">
                            </div>
                           <div class="input-field col s12">
                               <i class="material-icons prefix">face</i>
                               <textarea disabled readonly id="nome" class="materialize-textarea">{{$c->nome_prestante}}</textarea>
                               <label for="icon_prefix2">Nome</label>
                           </div>
                           <div class="input-field col s12">
                               <i class="material-icons prefix">account_circle</i>
                               <textarea disabled readonly id="nome" class="materialize-textarea">{{$c->email_prestante}}</textarea>
                               <label for="icon_prefix2">Email</label>
                           </div>
                           <div class="input-field col s12">
                               <i class="material-icons prefix">description</i>
                               <textarea disabled readonly id="nome" class="materialize-textarea">{{$c->status}}</textarea>
                               <label for="icon_prefix2">Status do contrato</label>
                           </div>
                           <div class="input-field col s12">
                               <i class="material-icons prefix">payment</i>
                               <textarea disabled readonly id="nome" class="materialize-textarea">{{$c->metodoPagamento}}</textarea>
                               <label for="icon_prefix2">Metodo de pagamento aceito</label>
                           </div>

                           <div class="row col s12 l12 center-align">
                                <button class="btn verde">Selecionar Profissional</button>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
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