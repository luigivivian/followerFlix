<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Enuns extends Enum
{
//    ativacao
    const ativacao_inativo = "INATIVO";
    const ativacao_ativo = "ATIVO";
    const ativacao_invalida = "INVALIDO";

    const ativacao_pagamento_naoPago = 'AGUARDANDO PAGAMENTO';
    const ativacao_pagamento_pago = 'PAGO';
    const ativacao_pagamento_fim = 'EXPIRADO';

//    servicos
    const servico_basico = 'basico';
    const servico_pro = 'pro';
    const servico_super = 'super';


    const servico_status_default = "pendente";
    const servico_status_aprovado = "ativo";
    const servico_status_finalizado = "cancelado";


    const servico_preco_basico = 5;

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

    //disputes
    const dispute_status_analise = "Em analise";
    const dispute_status_aprovada = "Aprovada";
    const dispute_status_negada = "Negada";

    // visibilidade rede
    const visibilidade_on = "ativada";
    const visibilidade_off = "desativada";

    //redflag ban
    //bloquear visibilidade na rede
    const redflag_ban_default = "ativo";
    const redflag_ban_banido = "banido";
}
