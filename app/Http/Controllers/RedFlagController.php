<?php

namespace App\Http\Controllers;

use App\Enums\Enuns;
use App\RedFlag;
use App\Usuario;
use Illuminate\Http\Request;

class RedFlagController extends Controller
{
    //
    public function index(){
        $dados['redflags'] = RedFlag::where('email_reportado', '=', 'luigivivian@hotmail.com')->where('status', '=', Enuns::redflag_status_aprovada)->get();
        return view('redflags.index', $dados);
    }

    public function salvar(Request $request){
        $regras = [
            'nome_pessoal' => 'required|max:255',
            'email_pessoal' => 'required|max:255',
            'nome_reportado' => 'required|max:255',
            'email_reportado' => 'required|max:255',
            'descricao' => 'required|max:255',
        ];
        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $dados = $request->all();
        $this->validate($request, $regras, $msgError);
        $user = session()->get('user')->id;
        $dados['id_usuario'] = $user;

        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
            $name = sha1(time());
            $extension = $request->arquivo->extension();
            $nameFile = "$name.$extension";
            $dados['arquivo'] = $nameFile;
            $upload = $request->arquivo->storeAs('public/uploads/redflag', $nameFile);
            if(!$upload){
                $msg = "Falha ao enviar iamgem";
                return redirect()->route('redflag.visualizar', $user)->with('msg', $msg);
            }
        }
        $query = RedFlag::create($dados);
        if($query != null){
            $msg = 'RedFlag enviada com sucesso !';
            return redirect()->route('redflag.visualizar', $user)->with('msg', $msg);
        }
    }


    public function moderar(){
        if(session()->get('user')->tipoUsuario != Enuns::admin){
            return redirect()->route('redflag.visualizar');
        }else if(session()->get('user')->tipoUsuario == Enuns::admin){
            $dados['redflags'] = RedFlag::where('status', '=', 'Em analise')->get();
            return view('redflags.list', $dados);
        }
    }
        //abrir redfalg moderador
    public function analisar(Request $request){
        if(session()->get('user')->tipoUsuario != Enuns::admin)
            return redirect()->route('dashboard');
        $id = $request->id;
        $dados['redflag'] = RedFlag::where('id', '=',$id )->get();
        $dados['id'] = $id;
        return view('redflags.visualizar', $dados);
    }
    public function aprovar(Request $request){
        $r = new RedFlag();
        $idUser = session()->get('user')->id;
        $query = $r->aprovar($request->id);
        if($query){
            $msg = "Red flag aprovada";
            return redirect()->route('redflag.visualizar', $idUser)->with('msg', $msg);
        }else{

        }
    }

    public function negar(Request $request){
        $r = new RedFlag();
        $query = $r->negar($request->id);
        if($query){

        }else{

        }
    }

    public function formDispute(){

    }
}
