<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Enums\Enuns;

class Ativacao extends Model
{
    protected $table = 'ativacao';

    public function getAtivacao($u){
        $ativacao = DB::table('ativacao AS at')
            ->join('usuarios AS u', 'u.id', '=', 'at.id_usuario')
            ->select('u.id', 'u.nome', 'at.*')
            ->where([
                    ['u.id', '=', $u->id],
                    ['at.status', '<>', Enuns::ativacao_invalida],
                    ])->get();
        return $ativacao->first(); //return null if no found
    }

    public function verificarPagamento($u){
        $ativacao = DB::table('ativacao AS at')
            ->join('usuarios AS u', 'u.id', '=', 'at.id_usuario')
            ->select('u.id', 'u.nome', 'at.*')
            ->where([
                ['u.id', '=', $u->id],
                ['at.pago', '=', Enuns::ativacao_pago],
            ])->get();

        if($ativacao->first() != null){

           return true;
        }else{
            return false;
        }
    }

    public function confirmarAtivacao($a){
        $query = DB::table('ativacao')
            ->where('id', $a->id)->update(
                array(
                    'status' => Enuns::ativacao_ativo,
                    'pago'=> Enuns::ativacao_pago)
            );
        return $query;
    }


    public function desativarAtivacao($a){
        $query = DB::table('ativacao')
                    ->where('id', $a->id)->update(
                    array(
                        'status' => Enuns::ativacao_invalida,
                        'pago'=> Enuns::ativacao_fim)
                    );
        return $query;
    }



}
