<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;
use App\Usuario;
use App\Enums\Enuns;
class DashboardController extends Controller
{
    //
    public function index(){
        // get contratos obrigatorios usuario
//        $u = new Usuario();
//        $email = session()->get('user')->email;
//        $s = new ServicoController($email);
//        if($s->gerarContratosObrigatorios($email)){
//            return view('privada');
//        }else{
//            return 'erro ao gerar servico';
//        }

        $s = new Servico();
        $idUser = session()->get('user')->id;
        if(session()->get('user')->lider == 1){
            $u = new Usuario();
            $lastLider = $u->getLastLider();
            $dados['tokenLider'] = $lastLider->token;
        }

        $query = $s->getContratos($idUser);
        $dados['totalContratosAtivos'] = $s->countContratosAtivos($idUser);
        $dados['total_tarefas'] = $s->countMyTasks($idUser);
        $dados['renda_prevista'] = $s->getTotalRendaPrevista($idUser);
        $dados['contratos'] = $query;
        return view('privada', $dados);
    }
}
