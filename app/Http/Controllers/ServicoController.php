<?php

namespace App\Http\Controllers;

use App\Servico;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Mockery\Exception;

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
        if($query){
            return true;
        }else{
            return false;
        }
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
            $totalContratos = $s->countContratosAtivos($idContratante);
            if($totalContratos >= 10){
                $s->aprovarLoteServico($idContratante);
            }
            $dados['msg'] = "Contrato efetuado !";
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

    public function verificarValidadeContratos($idContratante){
        $s = new Servico();
        $contratos = $s->getContratosByContratante($idContratante);

        if (count($contratos) > 0) { //caso o usuario possuir contratos
            if (date("Y-m-d") >= date('Y-m-d', strtotime($contratos[0]->dataFimContrato)) && $contratos[0]->dataFimContrato != null) { //valida data
                //desativar conta usuario
                try{
                    $query = $s->finalizarLoteContratos($idContratante);
                }catch (Exception $e) {
                    return false;
                }
            }else if($contratos[0]->dataFimContrato == null || date("Y-m-d") < date('Y-m-d', strtotime($contratos[0]->dataFimContrato))){
                return true;
            }
        }
    }
}
