<?php

namespace App\Http\Controllers;

use App\Servico;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ServicoController extends Controller
{
    //
    public function gerarContratosObrigatorios($email){
        $u = new Usuario();
        $pais = $u->getPais($email);
        $servico = new Servico();
        $contratante = Usuario::where('email', $email)->first();
        $query = $servico->gerarContratosObrigatorios($pais, $contratante);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function visualizar(Request $request){
        $idContrato = request('id');
        $s = new Servico();
        $dados['contrato'] = $s->getContratos(null, $idContrato);
        return view('contrato.visualizar', $dados);
    }

    public function contratar(Request $request){
        $idContrato = $request->id;
        $dados['id'] = $idContrato;
        $s = new Servico();
        $query = $s->contratar($idContrato);
        if($query){
            $dados['msg'] = "Contrato efetuado !";
            $dados['error'] = false;
        }else{
            $dados['msg'] = "Erro ao efetuar contratação !";
            $dados['error'] = true;
        }
        return response()->json($dados);
    }

}
