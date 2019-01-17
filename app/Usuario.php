<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'login', 'email', 'senha', 'sobrenome', 'dataNascimento',
        'genero', 'senhaConfirmar','descricao', 'metodoPagamento'
    ];

    protected $hidden = [
        'senha'
    ];



    public function getPais(){
        $e = 'luigivivian@gmail.com';
        $data = DB::select('call getPais(?)',array($e));
        return $data;
    }



}
