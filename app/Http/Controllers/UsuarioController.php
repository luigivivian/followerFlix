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
            'genero' => 'required',
            'dataNascimento' => 'required',
        ];

        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $this->validate($request, $regras, $msgError);
        $loginValidar = Usuario::where('login', $request->login)->first();
        $emailValidar = Usuario::where('login', $request->email)->first();
        if($loginValidar == null && $emailValidar == null){
            $dados = $request->all();
            $dados['senha'] = bcrypt($dados['senha']);
            Usuario::create($dados);
            $data['msg'] = "Cadastro Realizado com sucesso !";
            return view('autenticacao.login', $data);
        }else{
            $dados['error'] = 'Login ou email já existente';
            return view('usuarios.registrar', $dados);
        }
    }

    public function myProfile()
    {
        $login = session()->get('user')->login;
        $usuario = Usuario::where('login', $login)->first();
        $dados['user'] = $usuario;
        return view('usuarios.edit', $dados);

    }
    public function update(Request $request, $id){
        $u = Usuario::find($id)->update($request->all());
        $dados['msg'] = "Dados Alterados !";
        $usuario = Usuario::where('id', $id)->first();
        $dados['user'] = $usuario;
        return view('usuarios.edit', $dados);

    }
}