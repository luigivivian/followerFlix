@extends('app')

@section('content')
    <div class="col s12 l12" id="conteudo">
        <?php
            $idUser = session()->get('user')->id;

        ?>
        {!! Form::open(['method'=>'PUT', 'route'=>['user.update', $user->id], 'files' => true, 'name'=>'formDados']) !!}
        {{  csrf_field() }}
        <div class="card cardDados">
            <div class="card-content darkgrey-text">
                   <div class="row">
                       <div class="col s4 l4 center-align cardAvatar">
                           <div>
                               <div class="">
                                   <img class="avatarPerfil" src="{{ asset('storage/uploads/avatar/'.session()->get('user')->avatar_img) }}">
                               </div>
                               <div class="file-field input-field">
                                   <div class="btn red lighten-1">
                                       <span>IMAGEM</span>
                                       <input type="file" name="avatar_img">
                                   </div>
                                   <div class="file-path-wrapper">
                                       <input class="file-path validate" type="text" placeholder="Selecione uma imagem">
                                   </div>
                               </div>
                           </div>
                           <div>
                               <label>Breve descrição</label>
                               <textarea style="resize: none;" class="textareaPerfil" type="text" name="descricao" rows="12">{{$user->descricao }}</textarea>
                           </div>
                       </div>
                       <div class="col s4 l4">
                           <div class="input-field col s12">
                               <input placeholder="Nome" name="nome" value="{{ $user->nome }}" id="nome" type="text" class="validate" required>
                               <label for="nome">Name</label>
                           </div>
                           <div class="input-field col s12">
                               @if(session()->get('ativacao') == false)
                                   <?php $ativacao = "NÃO ATIVO"; ?>
                               @elseif(session()->get('ativacao')->dataValidade)
                                   <?php $ativacao = "ATIVO ATÉ : ". date('d-m-Y', strtotime(session()->get('ativacao')->dataValidade)); ?>
                               @endif
                               <input placeholder="Fim ativação" style="color: red;" readonly value="{{$ativacao}}" name="dataExpiracao" id="dataExpiracao" type="text" class="validate" required>
                               <label for="dataExpiracao">Data fim ativação</label>
                           </div>

                           <div class="input-field col s12">
                               <input placeholder="Data Nascimento" value="{{$user->dataNascimento }}" name="dataNascimento" id="dataNascimento" type="text" class="validate" required>
                               <label for="dataExpiracao">Data de Nascimento</label>
                           </div>

                       </div>
                       <div class="col s4 l4">
                           <div class="input-field col s12">
                                   <input placeholder="Nome" name="email" value="{{ $user->email }}" id="email" type="text" class="validate" required>
                                <label for="sobrenome">Email</label>
                           </div>
                           <div class="input-field col s12">
                               <select required name="metodoPagamento">
                                   <option value="" disabled selected>Payment</option>
                                   <option value="paypal" <?= $user->metodoPagamento == "paypal" ? "selected" : ''; ?>>PayPal</option>
                               </select>
                               <label>Payment method</label>
                           </div>
                       </div>

                   </div>
            </div>
        </div>
            <div class="card cardDados">
                <div class="card-content darkgrey-text center-align">
                    <div class="row">

                        <div class="input-field col s12 l3">
                            <select required name="genero">
                                <option value="" disabled selected>Genero</option>
                                <option value="masculino" <?= $user->genero == "masculino" ? "selected" : ''; ?>>Masculino</option>
                                <option value="feminino" <?= $user->genero == "feminino" ? "selected" : ''; ?>>Feminino</option>
                            </select>
                            <label>Selecione seu genero</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select name="interesse">
                                <option value="" disabled selected>Interesses</option>
                                <option value="musica"<?= $user->interesse == "musica" ? "selected" : ''; ?>>Musica</option>
                                <option value="tecnologia"<?= $user->interesse == "tecnologia" ? "selected" : ''; ?>>Tecnologia</option>
                                <option value="carros"<?= $user->interesse == "carros" ? "selected" : ''; ?>>Carros</option>
                                <option value="esportes"<?= $user->interesse == "esportes" ? "selected" : ''; ?>>Esportes</option>
                                <option value="filmes"<?= $user->interesse == "filmes" ? "selected" : ''; ?>>Filmes</option>
                                <option value="moda"<?= $user->interesse == "moda" ? "selected" : ''; ?>>Moda</option>
                            </select>
                            <label>Interesse</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select name="prestacao_servico" required>
                                <option value="" disabled>Rede Social</option>
                                <option value="facebook"<?= $user->prestacao_servico == "facebook" ? "selected" : ''; ?>>Facebook</option>
                                <option value="instagram"<?= $user->prestacao_servico == "instagram" ? "selected" : ''; ?>>Instagram</option>
                                <option value="youtube"<?= $user->prestacao_servico == "youtube" ? "selected" : ''; ?>>Youtube</option>
                                <option value="website"<?= $user->prestacao_servico == "website" ? "selected" : ''; ?>>Website</option>
                            </select>
                            <label>Prestar engajamento</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select name="contratacao_servico" required>
                                <option value="" disabled>Rede Social</option>
                                <option value="facebook"<?= $user->contratacao_servico == "facebook" ? "selected" : ''; ?>>Facebook</option>
                                <option value="instagram"<?= $user->contratacao_servico == "instagram" ? "selected" : ''; ?>>Instagram</option>
                                <option value="youtube"<?= $user->contratacao_servico == "youtube" ? "selected" : ''; ?>>Youtube</option>
                                <option value="website"<?= $user->contratacao_servico == "website" ? "selected" : ''; ?>>Website</option>
                            </select>
                            <label>Receber engajamento</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l12 center-align">
                    <button class="amarelo btn btn-small modal-trigger" href="#modal1">Change Password</button>
                    <button type="submit" class="verde btn btn-small">SAVE</button>
                </div>

            </div>
        {!! Form::close() !!}
        <div id="modal1" class="modal">
            {!! Form::open(['name'=>'formSenha']) !!}
            {{  csrf_field() }}
                <div class="">
                    <h5 class="center-align">Confirme os dados para alterar sua senha</h5>
                    <div class="modal-content">
                        <div class="col l6">
                            <input placeholder="Sua senha atual" name="senhaAtual" id="senhaAtual" type="password" class="validate" required>
                            <label for="senhaAtual">Senha Atual</label>
                        </div>
                        <div class="col l6">
                            <input placeholder="Sua senha nova" name="senhaNova" id="senhaNova" type="password" class="validate" required>
                            <label for="senhaNova">Nova Senha</label>
                        </div>
                        <div class="col l6">
                            <input placeholder="Confirme a senha" name="senhaNovaConfirma" id="senhaNovaConfirma" type="password" class="validate" required>
                            <label for="senhaNovaConfirma">Confirmar Senha</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSenhaAlterar" class="modal-close waves-effect waves-green btn verde">Save</button>
                        <button type="button" class="modal-close waves-effect waves-red btn vermelho">Close</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>

    @if(isset($msg))
        <script>
            M.toast({html: '{{$msg}}', classes: 'rounded'});
        </script>

    @endif
    <script>
        $(document).ready(function(){
                $('.modal').modal();
                $('select').formSelect();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btnSenhaAlterar").click(function(e) {
                e.preventDefault();
                var senha = $("#senhaAtual").val();
                var senhaNova = $("#senhaNova").val();
                var senhaNovaConfirma = $('#senhaNovaConfirma').val();
                $.ajax({
                    dataType: 'json',
                    type:'PUT',
                    url: '<?= route('user.updatepassword', $idUser); ?>',
                    data:{senha:senha, senhaNova:senhaNova, senhaNovaConfirma:senhaNovaConfirma}
                }).done(function(data){
                    console.log(data);
                    if(data.error == false){
                        M.toast({html: data.msg, classes: 'verde'});
                    }else{
                        M.toast({html: data.msg, classes: 'vermelho'});
                    }

                });
            });
        });
    </script>
  @endsection

