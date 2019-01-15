@extends('app')

@section('content')
    <div class="col s12 l12" id="conteudo">

        <div class="card cardDados">
            <div class="card-content darkgrey-text">
                {!! Form::open(['route' => ["user.update", $user->id], 'method'=>'put', 'novalidate']) !!}
                {{  csrf_field() }}
                   <div class="row">
                       <div class="col s4 l4 center-align">
                           <img src="{{asset('imgs/avatar.png')}}" style="width: 50%; height: 50%;">
                           <div>
                               <label>Breve descrição</label>
                               <textarea style="resize: none;" type="text" name="descricao" rows="6">{{$user->descricao }}</textarea>
                           </div>
                       </div>
                       <div class="col s4 l4">
                           <div class="input-field col s12">
                               <input placeholder="Nome" name="nome" value="{{ $user->nome }}" id="nome" type="text" class="validate" required>
                               <label for="nome">Name</label>
                           </div>
                           <div class="input-field col s12">
                               @if($user->dataFimAtivacao == null)
                                   <?php $user->dataFimAtivacao = "NÃO ATIVO"; ?>
                               @endif
                               <input placeholder="Fim ativação" style="color: red;" readonly value="{{$user->dataFimAtivacao}}" name="dataExpiracao" id="dataExpiracao" type="text" class="validate" required>
                               <label for="dataExpiracao">Data fim ativação</label>
                           </div>
                           <div class="input-field col s12">
                               <select required name="metodoPagamento">
                                   <option value="" disabled selected>Payment</option>
                                   <option value="PAGSEGURO" <?= $user->metodoPagamento == "PAGSEGURO" ? "selected" : ''; ?>>PagSeguro</option>
                                   <option value="PAYPAL" <?= $user->metodoPagamento == "PAYPAL" ? "selected" : ''; ?>>PayPal</option>
                               </select>
                               <label>Payment method</label>
                           </div>

                       </div>

                       <div class="col s4 l4">
                           <div class="input-field col s12">
                               <input placeholder="Sobrenome" value="{{ $user->sobrenome }}" name="sobrenome" id="sobrenome" type="text" class="validate" required>
                               <label for="sobrenome">Sobrenome</label>
                           </div>
                           <div class="input-field col s12">
                                   <input placeholder="Nome" name="nome" value="{{ $user->email }}" id="nome" type="text" class="validate" required>
                                <label for="sobrenome">Email</label>
                           </div>

                       </div>
                      <div class="row">
                          <div class="input-field col s12 l4 center-align">
                              <button class="amarelo btn btn-small modal-trigger" href="#modal1">Change Password</button>
                          </div>
                          <div class="input-field col s12 l4 center-align">
                              <button type="submit" class="verde btn btn-small">SAVE</button>
                              {{--{!! Form::submit('Submit', ['class' => 'btn form-control']) !!}--}}
                          </div>
                      </div>

                   </div>

                {!! Form::close() !!}
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

    <script src="{{ asset('js/bootstrap/Jquery.js') }}"></script>

    <script src="{{ asset('assets/materialize/js/materialize.js') }}"></script>

    @if(isset($msg))
        <script>
            M.toast({html: '{{$msg}}', classes: 'rounded'});
        </script>

    @endif
    <script>
        $(document).ready(function(){
            $(document).ready(function(){
                $('.modal').modal();
                $('select').formSelect();
            });
        });
    </script>
  @endsection

