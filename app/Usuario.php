<?php

namespace App;

use App\Enums\Enuns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'login', 'email', 'senha', 'sobrenome', 'dataNascimento',
        'genero', 'senhaConfirmar','descricao', 'metodoPagamento', 'tokenConvite', 'id_usuario_pai', 'token', 'avatar_img',
        'redeSocialContratar', 'redeSocialPrestar', 'idade', 'interesse'
    ];

    protected $hidden = [
        'senha'
    ];

    public function getPais($e){
        $data = DB::select('call getPais(?)',array($e));
        return $data;
    }

    public function desativarUsuario($u){
        $query = DB::table('usuarios')->where('id', $u->id)->update(array('status' => Enuns::usuario_inativo));
        if($query == 1){
            return true;
        }else{
            return false;
        }
    }

    public function ativarUsuario($u){
        $query = DB::table('usuarios')->where('id', $u->id)->update(array('status' => Enuns::usuario_ativo));
        if($query == 1){
            return true;
        }else{
            return false;
        }
    }


}
