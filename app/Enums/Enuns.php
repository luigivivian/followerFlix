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

//    servicos ##   planos  ####
    const servico_basico = 'BASICO';
    const servico_pro = 'PRO';
    const servico_super = 'SUPER';

    const servico_status_default = "PENDENTE";
    const servico_status_aprovado = "ATIVO";
    const servico_status_finalizado = "CANCELADO";

//   #########  Lote     #############
    const servico_lote_aprovado = "APROVADO";
    const servico_lote_neutro = "AGUARDANDO LIBERACAO";
    const servico_lote_invalido = "CONTRATO ENCERRADO";

    const servico_preco_basico = 5;

//    Usuario
    const usuario_inativo = 0;
    const usuario_ativo = 1;
    //tipos usuarios
    const usuario = "U";
    const admin = "A";


    //redflags
    const redflag_status_analise = "EM ANALISE";
    const redflag_status_aprovada = "APROVADA";
    const redflag_status_negada = "NEGADA";

    //disputes
    const dispute_status_analise = "EM ANALISE";
    const dispute_status_aprovada = "APROVADA";
    const dispute_status_negada = "NEGADA";

    // visibilidade rede
    const visibilidade_on = "ATIVADA";
    const visibilidade_off = "DESATIVADA";

    //redflag ban
    //bloquear visibilidade na rede
    const redflag_ban_default = "ATIVO";
    const redflag_ban_banido = "BANIDO";


    //token status
    const token_ativo = "ATIVO";
    const token_inativo = "INATIVO";
}
