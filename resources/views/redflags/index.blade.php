
@extends('app')

@section('content')
    <div id="conteudo">
        <div class="center-align">
            <h4 class="vermelho-txt">Red Flags</h4>
        </div>
        <div class="row containerRedFlags col l12">
            <div class="col s12 l4">
                <div class="card branco">
                    <div class="card-content cinza-text">
                        <div>
                            <h5>Day - </h5>
                            <h5>Razão - </h5>
                        </div>
                        <div class="center-align">
                            <button class="btn btn-small vermelho branco-txt btnFull">DISPUTE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card branco">
                    <div class="card-content cinza-text">
                        <div>
                            <h5>Day - </h5>
                            <h5>Razão - </h5>
                        </div>
                        <div class="center-align">
                            <button class="btn btn-small vermelho branco-txt btnFull">DISPUTE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card branco">
                    <div class="card-content cinza-text">
                     <div>
                         <h5>Day - </h5>
                         <h5>Razão - </h5>
                     </div>
                        <div class="center-align">
                            <button class="btn btn-small vermelho branco-txt btnFull">DISPUTE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 l10">
            <div>
                <div class="center-align">
                    <div class="divider"></div>
                    <h4 class="vermelho-txt">Create your redflag</h4>
                    <div class="divider"></div>
                </div>


                <div class="col s12 l12 center-align mt-3">
                    <div class="row">
                        <form class="formRedFlag col s12 l10 offset-l1">
                            <div class="row">
                                <div class="left-align ml-01">
                                    <h5>Your Personal Information</h5>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Seu Nome" id="nome" name="nome" type="text" class="validate">
                                    <label for="nome">Nome</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Seu Email" id="email" name="email" type="text" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="left-align ml-01">
                                    <h5>Informações usuario</h5>
                                </div>
                                <div class="divider"></div>
                                <div class="input-field col s6">
                                    <input placeholder="Nome do usuario" id="nome_denunciado" name="nome_denunciado" type="text" class="validate">
                                    <label for="nome_denunciado">Nome</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Email do usuario" id="email_denunciado" name="email_denunciado" type="text" class="validate">
                                    <label for="email_denunciado">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Descrição da denúncia</label>
                                </div>
                            </div>
                            <div class="row col l12">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>ARQUIVO</span>
                                        <input type="file" name="arquivo">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Selecione uma foto" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="mb-2">
                                <button class="btn vermelho branco-txt btnBlock-50">ENVIAR</button>
                            </div>
                        </form>
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