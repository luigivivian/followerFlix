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

    const ativacao_naoPago = 'aguardando pagamento';
    const ativacao_pago = 'pago';
    const ativacao_fim = 'expirado';

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




}
