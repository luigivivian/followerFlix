<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedFlag extends Model
{
    protected $fillable = [
       'nome_pessoal', 'email_pessoal', 'nome_reportado', 'email_reportado', 'descricao', 'arquivo', 'id_usuario'
    ];
}
