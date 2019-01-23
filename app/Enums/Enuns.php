<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Enuns extends Enum
{
//    ativacao
    const ativacao_inativo = 0;
    const ativacao_pendente = 1;
    const ativacao_ativo = 2;
    const ativacao_invalida = 3;

    const ativacao_pagamento_naoPago = 'aguardando pagamento';
    const ativacao_pagamento_pago = 'pago';
    const ativacao_pagamento_fim = 'expirado';

//    servicos
    const servico_basico = 'basico';
    const servico_pro = 'pro';
    const servico_super = 'super';

//    Usuario
    const usuario_inativo = 0;
    const usuario_ativo = 1;
    //tipos usuarios
    const usuario = "U";
    const admin = "A";


    //redflags
    const redflag_status_analise = "Em analise";
    const redflag_status_aprovada = "Aprovada";
    const redflag_status_negada = "Negada";




}
