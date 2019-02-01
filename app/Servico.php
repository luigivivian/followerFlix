<?php

namespace App;

use App\Http\Controllers\RedeController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Enums\Enuns;

class Servico extends Model
{
    //
    public function gerarContratosObrigatorios($pais, $contratante){

        for($i = 0; $i < count($pais); $i++){//gerando 10 contratos
            $s = new Servico();
            $s->tipoServico = 'basico';
            $s->contrato = true;
            $s->prestacao = false;
            $s->id_prestante = $pais[$i]->id;
            $s->id_contratante = $contratante->id;
            $s->save();
        }
        return true;
    }

    public function gerarCotratosRestantes($pais, $contratante){
        for($i = 0; $i < count($pais); $i++){//gerando 10 contratos
            $s = new Servico();
            $s->tipoServico = 'basico';
            $s->contrato = true;
            $s->prestacao = false;
            $s->id_prestante = $pais[$i];
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

    public function contratar($id){
        $query = DB::table('servicos')->where('id', $id)->update(array('status' => Enuns::servico_status_aprovado));
        if($query == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getContratosAtivos($idUser){
        $query = DB::select('SELECT * FROM servicos where status = :status AND id_contratante = :id_contratante',
                            ['status' =>Enuns::servico_status_aprovado, 'id_contratante'=> $idUser]);
        return $query;
    }

    public function countContratosAtivos($idUser){
        $query = DB::select('SELECT count(*) as total FROM servicos where status = :status AND id_contratante = :id_contratante',
            ['status' =>Enuns::servico_status_aprovado, 'id_contratante'=> $idUser]);
        return $query;
    }
//select * from usuarios u
//INNER JOIN servicos s
//ON u.id = s.id_contratante
//INNER JOIN usuarios up
//ON up.id = s.id_prestante
//WHERE u.id = 13
}
