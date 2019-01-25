@extends('app')

@section('content')

    @inject('e', 'App\Enums\Enuns')
    <div id="conteudo">
        <?php $r = $redflag[0];?>
        <div class="col s12 l12">
            <div class="center-align">
                <div class="divider"></div>
                <h4 class="vermelho-txt">DISPUTE REDFLAG</h4>
                <h4 class="vermelho-txt center-align">ID: {{$r->id}}</h4>
                <div class="divider"></div>
            </div>
            <div class="row">
                <div class="col s12 l12 center-align mt-3">
                    {{--Formulario--}}
                    <div class="formRedFlag col s12 l10 offset-l1">
                        {!! Form::open(['route' => ["redflag.sendDispute", $r->id],  'files' => true, 'method'=>'post']) !!}
                        {{  csrf_field() }}

                        <div class="row">
                            <h5>Justifique sua redflag</h5>

                                <div class="input-field col s12">
                                    <input placeholder="" readonly value="@if(isset($r->id)) {{ $r->id }} @else {{"0"}}@endif" id="id_redflag" name="id_redflag" type="text" class="validate" required>
                                    <label for="nome">ID</label>
                                </div>

                            <div class="input-field col s12">
                                <textarea id="textarea1" name="descricao" rows="8" style="resize: none; height: 7rem;" required></textarea>
                                <label for="textarea1"  style="padding-left: 5px;">Justificativa</label>
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