<?php

namespace App\Http\Controllers;
use App\Ativacao;
use App\Enums\Enuns;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AutenticacaoController extends Controller
{
    public function home()
    {
        return view('autenticacao.login');
    }

    public function privada()
    {
        return view('privada');
    }

    public function login()
    {

        return view('autenticacao.login');
    }

    public function logar(Request $request)
    {
        $dados = $request->all(); //get request data
        $login = $dados['login'];
        $senha = $dados['senha'];
        $usuario = Usuario::where('login', $login)->first(); //get user in database
        if(Auth::check() || ($usuario && Hash::check($senha, $usuario->senha))){// valida dados do login
            Auth::login($usuario);
            if($usuario->avatar_img == null){ //if image is null get default avatar img
                $usuario->avatar_img = "avatarDefault.png";
            }
            //verificar validade de contratos

            session(['user' => $usuario]);
            //Verificar ativacao e contratos
            $a = new AtivacaoController();
            $status = $a->verificarAtivacao($usuario);
            if($status == true){
                $s = new ServicoController();
                $totalContratos = $s->countContratos($usuario->id); //contando contratos
                $u = new Usuario();

                //verica contratos ativos
                $contratosAtivos = $s->verificarValidadeContratos($usuario->id);
                if($contratosAtivos == false){
                    $s->gerarContratosObrigatorios($usuario->email);
                    $msg = 'Contratos Expirados, renove seus contratos !';
                }
                //controle do token de convite
                if($totalContratos < 10 AND $usuario->tokenStatus == Enuns::token_ativo){
                    $u->desativarToken($u->id);
                }else if($totalContratos > 10 AND $usuario->tokenStatus == Enuns::token_inativo){
                    $u->ativarToken($u->id);
                }
                $aModel = new Ativacao();
                session(['ativacao' => $aModel->getAtivacao($usuario)]);
                session(['usuarioAtivo' => true]);
            }else{
                session(['ativacao' => $status]);
                session(['usuarioAtivo' => false]);
            }
            return redirect(route('dashboard'))->with('msg', $msg);
        } else {
            $dados['error'] = "Usuario ou senha incorretos";
            return view('autenticacao.login', $dados);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect(route('home'));
    }
}
