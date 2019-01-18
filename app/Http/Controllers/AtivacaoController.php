<?php

namespace App\Http\Controllers;

use App\Ativacao;
use App\Enums\Enuns;
use Illuminate\Http\Request;

class AtivacaoController extends Controller
{
    //
    public function verificarAtivacao($u)
    {
        $a = new Ativacao();
        $ativacao = $a->getAtivacao($u);
        if ($ativacao != null) { //caso o usuario possuir ativacao
            if (date("Y-m-d") >= date('Y-m-d', strtotime($ativacao->dataValidade)) && $ativacao->dataValidade != null) {
                //desativar conta usuario
                $user = new UsuarioController();
                $user->desativarUsuario($u);
                $a->desativarAtivacao($ativacao);
                return false;
            } else if (date("Y-m-d") < date('Y-m-d', strtotime($ativacao->dataValidade)) && $ativacao->status == Enuns::ativacao_ativo && $ativacao->pago == Enuns::ativacao_pago) {
                return true;
            }
        } else {
            //$at = $this->gerarAtivacao($u);
            return false;
        }
    }

    public function comprarAtivacao(Request $request)
    {
        $usuario = session()->get('user');
//        $u = new Usuario();
//        $query = $u->ativarUsuario($usuario);
        $a = new Ativacao();
        if ($a->getAtivacao($usuario) == null) {
            $this->gerarAtivacao($usuario);
            return "Após a confirmação do pagamento sua conta será ativa";
        } else {
            return "Você possui uma ativação aguardando pagamento";
        }

    }

    public function confirmarAtivacao() //valida pagamento e ativa usuario caso o pagamento estiver true
    {
        $u = session()->get('user');
        $a = new Ativacao();
        $pagamento = $a->verificarPagamento($u); //verifica pagamento no banco de dados
        $ativacao = $a->getAtivacao($u);
        if($pagamento == true){
            $a->confirmarAtivacao($ativacao);
            $dados['error'] = "Pagamento aprovado, conta ativa";
            return view('autenticacao.login', $dados);
        }else{
            return "Pagamento não aprovado !!!";
        }
    }

    public function gerarAtivacao($u)
    {
        $a = new Ativacao();
        $a->dataCompra = date("Y-m-d");
        $a->id_usuario = $u->id;
        $a->save();
        return $a;
    }
}