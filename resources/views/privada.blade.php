
@extends('app')

@section('content')
<div id="conteudo">
        <div>
            <div>
                <div class="col s12 l12">
                    <div class="card cardDados">
                        <div class="card-content darkgrey-text">
                            <div class="row">
                                <div class="col s4 l4 center-align">
                                    <img src="{{asset('imgs/avatar.png')}}" style="width: 50%; height: 50%;">

                                    <div>
                                        <label>Breve descrição</label>
                                        <textarea></textarea>
                                    </div>
                                </div>
                                <div class="col s4 l4">
                                    <div class="input-field col s12">
                                        <input placeholder="Nome" name="nome" value="" id="nome" type="text" class="validate" required>
                                        <label for="nome">Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input placeholder="Fim ativação" name="dataExpiracao" id="dataExpiracao" type="date" class="validate" required>
                                        <label for="dataExpiracao">Data fim ativação</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <a class="verde btn modal-trigger" href="#modal1">Change Password</a>
                                    </div>

                                </div>
                                <div class="col s4 l4">
                                    <div class="input-field col s12">
                                        <input placeholder="Sobrenome" name="sobrenome" id="sobrenome" type="text" class="validate" required>
                                        <label for="sobrenome">Sobrenome</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select>
                                            <option value="" disabled selected>Payment</option>
                                            <option value="1">Pagseguro</option>
                                            <option value="2">PayPal</option>

                                        </select>
                                        <label>Payment method</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <form>
                                <div class="">
                                    <h5 class="center-align">Confirme os dados para alterar sua senha</h5>
                                    <div class="modal-content">
                                        <input placeholder="Sua senha atual" name="senhaAtual" id="senhaAtual" type="password" class="validate" required>
                                        <label for="senhaAtual">Senha Atual</label>
                                    </div>
                                    <div class="modal-content">
                                        <input placeholder="Sua senha nova" name="senhaNova" id="senhaNova" type="password" class="validate" required>
                                        <label for="senhaNova">Nova Senha</label>
                                    </div>
                                    <div class="modal-content">
                                        <input placeholder="Confirme a senha" name="senhaNovaConfirma" id="senhaNovaConfirma" type="password" class="validate" required>
                                        <label for="senhaNovaConfirma">Confirmar Senha</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="modal-close waves-effect waves-green btn verde">Save</button>
                                        <button type="button" class="modal-close waves-effect waves-red btn vermelho">Close</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
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