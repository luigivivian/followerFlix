<?php

namespace App\Http\Controllers;

use App\Servico;
use App\Usuario;
use Illuminate\Http\Request;

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

}
