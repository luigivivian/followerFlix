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

    public function aprovar($id){
        $query = DB::table('red_flags')
            ->where('id', $id)
            ->update(array('status' => Enuns::redflag_status_aprovada));
        return $query;
    }

    public function negar($id){
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
            $query = DB::table('dispute')->where('status', Enuns::dispute_status_analise)->where('id', $id)->get();
            return $query;
        }else{
            $query = DB::table('dispute')->where('status', Enuns::dispute_status_analise)->get();
            return $query;
        }

    }
}
