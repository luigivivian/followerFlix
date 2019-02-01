<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rede extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'titulo', 'src', 'descricao', 'id'
    ];
    //chamar procedure get pais
    // contar registros retornados
    // se valor de registros < 10

    public function getLiders(){
        $query = DB::select('SELECT id, id_usuario_pai FROM usuarios WHERE lider = 1 LIMIT 9');
        return $query;
    }

    public function updateLider($idUser, $idPai){
        $query = DB::select('UPDATE usuarios SET id_usuario_pai = :idPai where id = :id', ['id'=>$idUser, 'idPai'=>$idPai]);
        return $query;
    }

    public function getLiderFixo(){
        $query = DB::select('SELECT id, id_usuario_pai, nome
                    FROM usuarios
                    WHERE lider = 1
                    ORDER BY id DESC
                    LIMIT 1');
        return $query[0]->id;
    }

    public function getNodoInicial(){
        $query = DB::select('select * from usuarios
                            where isnull(id_usuario_pai)');
        return $query;
    }

}
