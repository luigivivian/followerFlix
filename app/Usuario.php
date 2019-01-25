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
        'contratacao_servico', 'prestacao_servico', 'idade', 'interesse'
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

    public function searchByEmailAndName($input){
        $user =  DB::table('usuarios')->where('status', '=', '1')->where('nome','LIKE','%'.$input.'%')->get();
        if(count($user) < 1){
            $user =  DB::table('usuarios')->where('status', '=', '1')->where('email','LIKE','%'.$input.'%')->get();
        }
        return $user;
    }

    public function filter($data){
//        self::where([['email','=',$email],['password','=', $password]])
        //ajustar query busca
        $user =  DB::table('usuarios')
            ->where('idade','>=', $data['idade'])->where('idade','<=', ($data['idade'] + 4))->where('status','=','1')->orWhere('id','>','1')
            ->where('genero','LIKE','%'.$data['genero'].'%')
            ->where('interesse','LIKE','%'.$data['interesse'].'%')
            ->where('prestacao_servico','LIKE','%'.$data['prestacao_servico'].'%')->limit(15)->get();
        return $user;
    }

    public function getUser($id){
        $user =  DB::table('usuarios')->where('id', '=', $id)->first();
        return $user;
    }

}
