<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login()
    {
        return view('autenticacao.login');
    }

    public function registrar()
    {
        return view('usuarios.registrar');
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome' => 'required|max:255',
            'login' => 'required|max:255',
            'email' => 'required|max:255',
            'senha' => 'required|max:255',
        ];

        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $this->validate($request, $regras, $msgError);


        $dados = $request->all();
            $dados['senha'] = bcrypt($dados['senha']);
            Usuario::create($dados);
            return redirect()->route('home');
    }
}
