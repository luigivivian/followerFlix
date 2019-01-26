<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tutorial extends Model
{
    protected $fillable = [
        'titulo', 'src', 'descricao'
    ];

    public function getTutorials($id = null){
        if($id){
            $query = DB::select('SELECT * FROM tutorial WHERE id = :id', ['id' => $id]);
        }else{
            $query = DB::select('SELECT * FROM tutorial');
        }
        return $query;
    }
}
