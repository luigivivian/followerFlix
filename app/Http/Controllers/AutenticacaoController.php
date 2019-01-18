<?php

namespace App\Http\Controllers;
use App\Ativacao;
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
        $dados = $request->all();
        $login = $dados['login'];
        $senha = $dados['senha'];
        $usuario = Usuario::where('login', $login)->first();
        if(Auth::check() || ($usuario && Hash::check($senha, $usuario->senha))){
            Auth::login($usuario);
            session(['user' => $usuario]);
            //Verificar ativacao e contratos
            $a = new AtivacaoController();
            $status = $a->verificarAtivacao($usuario);
            if($status == true){
                $aModel = new Ativacao();
                session(['ativacao' => $aModel->getAtivacao($usuario)]);
                session(['usuarioAtivo' => true]);
            }else{
                session(['ativacao' => $status]);
                session(['usuarioAtivo' => false]);
            }
            return redirect(route('dashboard'));
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
