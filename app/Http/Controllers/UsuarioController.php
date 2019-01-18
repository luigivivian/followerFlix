<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;
use Exception;
class UsuarioController extends Controller
{
    public function login()
    {
        return view('autenticacao.login');
    }

    public function registrar($token)
    {
        //controle de convite
        //usuario só tem acesso ao registro atravez do link de convite
        $dados['token'] = $token;
        $u = Usuario::where('token', $token)->first();
        if(!isset($u->token)){
            return "CONVITE INVALIDO 1";
        }else{
            if($u->status == 0){
                return "CONVITE INVALIDO USUARIO COM STATUS INATIVO";
            }else{
                $dados['token'] = $u;
                $dados['id_usuario_pai'] = $u->id;
                return view('usuarios.registrar',$dados);
            }
        }
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
        $dados = $request->all();
        $this->validate($request, $regras, $msgError);
        $loginValidar = Usuario::where('login', $request->login)->first();
        $emailValidar = Usuario::where('email', $request->email)->first();

        //controle de convite
        //usuario só tem acesso ao registro atravez do link de convite

        $u = Usuario::where('token', $dados['tokenConvite'])->first();
        unset($dados['tokenConvite']);
        if(!isset($u->token)){
            return "Convite invalido";
        }else{
            if($u->status == 1){
                if($loginValidar == null && $emailValidar == null){
                    $dados['senha'] = bcrypt($dados['senha']);
                    $insert = $this->generateKeyAndCreateUser($dados);
                    if($insert === true){ //cadastro efetuado com sucesso !
                        $email = $dados['email'];
                        $s = new ServicoController();
                        if($s->gerarContratosObrigatorios($email)){
                            $data['msg'] = "Cadastro Realizado com sucesso !";
                            return view('autenticacao.login', $data);
                        }else{
                            $dados['error'] = 'Erro no cadastro';
                            return view('usuarios.registrar', $dados);
                        }
                    }else{
                        return $insert;
                    }
                }else{
                    $dados['error'] = 'Login ou email já existente';
                    return view('usuarios.registrar', $dados);
                }
            }else{
              return "Convite invalido";
            }
        }
    }

    public function generateKeyAndCreateUser($dados){
        try{
            $generatedToken = sha1(microtime());
            $dados['token'] = $generatedToken;
            Usuario::create($dados);
            return true;
        }catch(Exception $exception) {
            $this->generateKeyAndCreateUser($dados);
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

    public function profissionalFilter(){
        return view('usuarios.buscar');
    }
    public function buscarUsuario(Request $request){
        $filtro = $request->all()['procurar'];
        //Implementar buscar no banco
        //get more filters
        $u = new Usuario();
        $email = session()->get('user')->email;
        $dados['teste'] = $u->getPais($email);
        return view('usuarios.buscar', $dados);
    }
}