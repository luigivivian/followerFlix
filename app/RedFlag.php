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

    public function negarRedFlag($id){
        $query = DB::table('red_flags')
            ->where('id', $id)
            ->update(array('status' => Enuns::redflag_status_aprovada));
        return $query;
    }

    public function saveDispute($data){
        $query = DB::table('dispute')->insert($data);
        return $query;
    }

    public function getDispute($id = null){
        if($id){
            $query = DB::table('dispute as d')->select('d.*', 'd.arquivo as arquivoDispute', 'd.descricao as descricaoDispute', 'r.*')->where('d.status', Enuns::dispute_status_analise)
                ->join('red_flags as r', 'r.id', '=', 'd.id_redflag')->where('d.id', $id)->first();
            return $query;
        }else{
            $query = DB::table('dispute as d')->select('d.*', 'd.arquivo as arquivoDispute', 'd.descricao as descricaoDispute', 'r.*')->where('d.status', Enuns::dispute_status_analise)
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
