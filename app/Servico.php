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

    public function getContratos($id){
        $users = DB::table('usuarios AS u')
            ->join('servicos AS s', 'u.id', '=', 's.id_contratante')
            ->join('usuarios AS up', 'up.id', '=', 's.id_prestante')
            ->select('up.nome', 'up.email', 's.status')
            ->where('u.id', $id)
            ->get();
        return $users->toArray();
    }
//select * from usuarios u
//INNER JOIN servicos s
//ON u.id = s.id_contratante
//INNER JOIN usuarios up
//ON up.id = s.id_prestante
//WHERE u.id = 13
}
