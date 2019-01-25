<?php

namespace App;

use App\Enums\Enuns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RedFlag extends Model
{
    protected $fillable = [
       'nome_pessoal', 'email_pessoal', 'nome_reportado', 'email_reportado', 'descricao', 'arquivo', 'id_usuario'
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
}
