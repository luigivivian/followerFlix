
@extends('app')

@section('content')
<div id="conteudo">
    <div class="row">
       <div class="center-align vermelho-txt">
           <h4>Seus contratos</h4>
       </div>
        <div class="row col s12 m12 l12"> <!--1st row containing 2 cards-->
            <div class="col s12 m6 l3 card">
                <div class="card-content center-align">
                    <div>
                        <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                    </div>

                    <div class="center-align">
                        <h5 class="">Pedro Jamelao</h5>
                        <p>pedrojamelao@gmail.com</p>
                        <p class="status status-ativo">PAID</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3 card">
                <div class="card-content center-align">
                    <div>
                        <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                    </div>

                    <div class="center-align">
                        <h5 class="">Pedro Jamelao</h5>
                        <p>pedrojamelao@gmail.com</p>
                        <p class="status status-inativo">NOT PAID</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3 card">
                <div class="card-content center-align">
                    <div>
                        <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                    </div>

                    <div class="center-align">
                        <h5 class="">Pedro Jamelao</h5>
                        <p>pedrojamelao@gmail.com</p>
                        <p class="status status-ativo">PAID</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3 card">
                <div class="card-content center-align">
                    <div>
                        <img class="avatar" src="{{asset('imgs/avatar.png')}}">
                    </div>

                    <div class="center-align">
                        <h5 class="">Pedro Jamelao</h5>
                        <p>pedrojamelao@gmail.com</p>
                        <p class="status status-pendente">PENDING</p>
                    </div>
                </div>
            </div>
           <div class="right-align">
               <a>Show more 10</a>
           </div>
        </div>
    </div>

    <div class="row center-align">
        <div class="col s12 l6">
            <button class="btn vermelho branco-txt">CONTRATAR</button>
        </div>

        <div class="col s12 l6">
            <button class="btn vermelho branco-txt">LINK CONVITE</button>
        </div>
    </div>
    <div class="cardBotoes center-align">

    </div>

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