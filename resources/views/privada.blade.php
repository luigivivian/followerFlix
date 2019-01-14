

@extends('app')

@section('content')
<div>
    <painel titulo="Contratos Ativos">

        <contratos-ativos :users = "[{name: 'Person Name'},{name: 'Country'}]">

        </contratos-ativos>
    </painel>

</div>

@endsection