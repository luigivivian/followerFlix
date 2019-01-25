<?php

namespace App;

use App\Enums\Enuns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RedFlag extends Model
{
    protected $fillable = [
       'nome_pessoal', 'email_pessoal', 'nome_reportado', 'email_reportado', 'descricao', 'arquivo', 'id_usuario', 'id_redflag'
    ];

    public function aprovarRedFlag($id){
        $query = DB::table('red_flags')
            ->where('id', $id)
            ->update(array('status' => Enuns::redflag_status_aprovada));
        return $query;
    }

    public function negarRedFlag($id, $idUser){
        $query = DB::table('red_flags')
            ->where('id', $id)
            ->update(array('status' => Enuns::redflag_status_negada));
        //find usuario dono da redflag id passado por parametro
        $u = new Usuario();
        $user = $u->getUser($idUser);
//        $data['id_usuario'] = $user->id;
//        $data['email_pessoal'] = $user->email_pessoal;
//        $data['nome_pessoal'] = $user->nome_pessoal;
//        $data['email_reportado'] = $user->email_reportado;
//        $data['nome_reportado'] = $user->nome_reportado;
//        $data['email_pessoal'] = $user->email_pessoal;
//        $data['email_pessoal'] = $user->email_pessoal;
        DB::table('users')->insert(

        );
        return $query;
    }

    public function getRedFlagOwner($idRedFlag){
        $query = DB::table('usuarios as u')
            ->select('*')
            ->where('r.id', $idRedFlag)
            ->join('red_flags as r', 'r.id_usuario', '=', 'u.id')->where('r.id', $idRedFlag)->get();
        return $query;
    }

    public function saveDispute($data){
        $query = DB::table('dispute')->insert($data);
        return $query;
    }

    public function getDispute($id = null){
        if($id){
            $query = DB::table('dispute as d')
                        ->select('d.id as id_dispute', 'd.data as data_dispute', 'd.descricao as descricao_dispute',
                            'd.status as status_dispute', 'd.arquivo as arquivo_dispute', 'r.id as id_redflag', 'r.data as data_redflag',
                            'r.id_usuario as id_usuario_redflag', 'r.email_pessoal', 'r.nome_pessoal', 'r.email_reportado', 'r.nome_reportado',
                            'r.descricao as descricao_redflag', 'r.status as status_redflag', 'r.arquivo as arquivo_redflag')->where('d.status', Enuns::dispute_status_analise)
                        ->join('red_flags as r', 'r.id', '=', 'd.id_redflag')->where('d.id', $id)->get();
            return $query;
        }else{
            $query = DB::table('dispute as d')
                        ->select('d.id as id_dispute', 'd.data as data_dispute', 'd.descricao as descricao_dispute',
                            'd.status as status_dispute', 'd.arquivo as arquivo_dispute', 'r.id as id_redflag', 'r.data as data_redflag',
                            'r.id_usuario as id_usuario_redflag', 'r.email_pessoal', 'r.nome_pessoal', 'r.email_reportado', 'r.nome_reportado',
                            'r.descricao as descricao_redflag', 'r.status as status_redflag', 'r.arquivo as arquivo_redflag')->where('d.status', Enuns::dispute_status_analise)
                        ->join('red_flags as r', 'r.id', '=', 'd.id_redflag')->get();
            return $query;
        }
    }

    public function aprovarDispute($id, $idRedFlag){ //perdoar redflag
        $query = DB::table('dispute')
            ->where('id', $id)
            ->update(array('status' => Enuns::dispute_status_aprovada));
        $query2 = DB::table('red_flags')
            ->where('id', $idRedFlag)
            ->update(array('status' => Enuns::redflag_status_negada));
        return $query;
    }
    public function negarDispute($id, $idRedFlag){
        $query = DB::table('dispute')
            ->where('id', $id)
            ->update(array('status' => Enuns::dispute_status_negada));
        return $query;
    }
}
