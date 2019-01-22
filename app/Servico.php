<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servico extends Model
{
    //
    public function gerarContratosObrigatorios($pais, $contratante){

        foreach($pais as $key=>$v){
            $s = new Servico();
            $s->tipoServico = 'basico';
            $s->contrato = true;
            $s->prestacao = false;
            $s->id_prestante = $v->id;
            $s->id_contratante = $contratante->id;
            $s->save();
        }
        return true;
    }

    public function getContratos($idUser = null, $idContrato = null){
        if($idContrato == null){
            $users = DB::table('usuarios AS u')
                ->join('servicos AS s', 'u.id', '=', 's.id_contratante')
                ->join('usuarios AS up', 'up.id', '=', 's.id_prestante')
                ->select('s.id as idcontrato','up.nome as nome_prestante', 'up.email as email_prestante', 's.status', 's.tipoServico', 'up.metodoPagamento')
                ->where('u.id', $idUser)
                ->get();
        }else{
            $users = DB::table('usuarios AS u')
                ->join('servicos AS s', 'u.id', '=', 's.id_contratante')
                ->join('usuarios AS up', 'up.id', '=', 's.id_prestante')
                ->select('s.id as idcontrato','up.nome as nome_prestante', 'up.email as email_prestante', 's.status', 's.tipoServico','up.metodoPagamento')
                ->where('s.id', $idContrato)
                ->get();
        }
        return $users->toArray();
    }
//select * from usuarios u
//INNER JOIN servicos s
//ON u.id = s.id_contratante
//INNER JOIN usuarios up
//ON up.id = s.id_prestante
//WHERE u.id = 13
}
