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
        $totalContratos = count($pais);
        $servico = new Servico();
        $contratante = Usuario::where('email', $email)->first();
        $query = $servico->gerarContratosObrigatorios($pais, $contratante);
        $u = new Usuario();
        //função pega 10 pais acima
        /*
         * a busca exclui os lideres, então,
         *  caso retorne valor menor que 10 significa que o algoritmo chegou no nivel dos lideres
         * então deverá buscar a quantidade restante para completar 10 contratos
         * buscar lideres de forma aleatoria
         */
        if(count($pais) < 10){
            $total = 10 - count($pais);
            $r = new RedeController();
            $lideres = $r->getShuffledLideres();
            $contratos = array();
            while($total != 0){
                array_push($contratos, $lideres[$total]);
                $total--;
            }
            $query2 = $servico->gerarCotratosRestantes($contratos, $contratante);
            if(!$query2){
                return false;
            }
        }
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
        $idContratante = session()->get('user')->id;
        $dados['id'] = $idContrato;
        $s = new Servico();
        $query = $s->contratar($idContrato);
        if($query){
            $dados['msg'] = "Contrato efetuado !";
            $totalContratos = $s->countContratosAtivos($idContratante);
            if($totalContratos >= 10){
                $s->aprovarLoteServico($idContratante);
            }
            $dados['error'] = false;
        }else{
            $dados['msg'] = "Erro ao efetuar contratação !";
            $dados['error'] = true;
        }
        return response()->json($dados);
    }

    public function countContratos($idUser){
        $s = new Servico();
        $total = $s->countContratosAtivos($idUser);
        return $total;
    }

    public function mytasks(Request $request){
        $s = new Servico();
        $idUser = session()->get('user')->id;
        $dados['myTasks'] =  $s->getMyTasks($idUser);
        return view('contrato.myTasks', $dados);
    }
}
