@extends('app')

@section('content')

    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo">
        <div class="center-align">
            <h4 class="vermelho-txt">Red Flags</h4>
            @if(session('msg'))
                <div class="center-align verde-txt">
                    <h5>{{ session('msg') }}</h5>
                </div>
            @endif

        </div>
       @if(session()->get('user')->tipoUsuario == \App\Enums\Enuns::admin)
            <div class="center-align mt-1 mb-2">
                <h4>Opções administrativas</h4>
                <a class="btn btnBlock vermelho" href="{{route('redflag.moderar')}}">Moderar RedFlags</a>
            </div>
       @endif
        <div class="row containerRedFlags col s12 l12">
            <?php $cont = 3;?>
            @foreach($redflags as $r)
                <?php $cont--; ?>
                <div class="col s12 l4">
                    <div class="card branco">
                        <div class="card-content cinza-text">
                            <div>
                                <h5>Day - {{$r->data}}</h5>
                                <h5>Autor - {{$r->nome_pessoal}}</h5>
                            </div>
                            <div class="center-align">
                                <a href="{{route('redflag.dispute', $r->id)}}" class="btn btn-small vermelho branco-txt btnFull">DISPUTE</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <?php
                for($i = $cont; $cont > 0; $cont--){
            ?>
                <div class="col s12 l4">
                    <div class="card branco">
                        <div class="card-content cinza-text">
                            <div>
                                <h5>Day - </h5>
                                <h5>Autor - </h5>
                            </div>
                            <div class="center-align">
                                <button class="btn btn-small vermelho branco-txt btnFull">DISPUTE</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>

        <div class="col s12 l12">
            <div class="center-align">
                <div class="divider"></div>
                <h4 class="vermelho-txt">Create your redflag</h4>
                <div class="divider"></div>
            </div>
            <div class="row">
                <div class="col s12 l12 center-align mt-3">
                    {{--Formulario--}}

                    <div class="formRedFlag col s12 l10 offset-l1">
                        {!! Form::open(['route' => ["redflag.enviar"],  'files' => true, 'method'=>'post']) !!}
                        {{  csrf_field() }}
                            <div class="row">
                                <div class="ml-01">
                                    <h5 class="left-align">Your Personal Information</h5>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Seu Nome" id="nome" readonly value="{{session()->get('user')->nome}}" name="nome_pessoal" type="text" class="validate" required>
                                    <label for="nome">Nome</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Seu Email" id="email" readonly value="{{session()->get('user')->email}}" name="email_pessoal" type="email" class="validate" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="ml-01">
                                    <h5 class="left-align">Informações Denuncia</h5>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Nome reportado" id="nome_reportado" name="nome_reportado" type="text" class="validate" required>
                                    <label for="nome">Nome</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Email reportado" id="email_reportado" name="email_reportado" name="email" type="text" class="validate" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" name="descricao" rows="8" style="resize: none;" required></textarea>
                                    <label for="textarea1">Descrição da denúncia</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>ARQUIVO</span>
                                        <input type="file" name="arquivo">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Selecione uma foto" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btnBlock vermelho mt-1 mb-2">ENVIAR</button>
                            </div>
                        {!! Form::close() !!}
                        {{--Fim formulario--}}
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