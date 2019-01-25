<?php

namespace App\Http\Controllers;

use App\Enums\Enuns;
use App\RedFlag;
use App\Usuario;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class RedFlagController extends Controller
{
    //
    public function index(){
        $dados['redflags'] = RedFlag::where('email_reportado', '=', 'luigivivian@hotmail.com')->where('status', '=', Enuns::redflag_status_aprovada)->get();
        return view('redflags.index', $dados);
    }

    public function veraprovadas(){
        if(session()->get('user')->tipoUsuario != Enuns::admin){
            return redirect()->route('redflag.visualizar');
        }else if(session()->get('user')->tipoUsuario == Enuns::admin){
            $dados['redflags'] = RedFlag::where('status', '=', Enuns::redflag_status_aprovada)->get();
            $dados['aprovadasPage'] = true;
            return view('redflags.list', $dados);
        }
    }
    public function disputes(){
        $r = new RedFlag();
        $query = $r->getDispute();
        $dados['disputes'] = $query;
        return view('redflags.dispute_list', $dados);
    }

    public function disputeVer(Request $request){
        $id = $request->id;
        $r = new RedFlag();
        $query = $r->getDispute($id);
        $dados['disputes'] = $query;
        return view('redflags.dispute_ver', $dados);
    }

    public function aprovarDispute(Request $request){
        $idDispute = $request->iddispute;
        $idRedFlag = $request->idredflag;
        $r = new RedFlag();
        $query = $r->aprovarDispute($idDispute, $idRedFlag);
        if($query){
            $query = $r->getDispute();
            $dados['disputes'] = $query;
            $dados['msg'] = "Dispute aprovada !";
            return view('redflags.dispute_list', $dados);
        }
    }

    public function negarDispute(Request $request){
        $idDispute = $request->iddispute;
        $idRedFlag = $request->idredflag;
        $r = new RedFlag();
        $query = $r->negarDispute($idDispute, $idRedFlag);
        if($query){
            $query = $r->getDispute();
            $dados['disputes'] = $query;
            $dados['msg'] = "Dispute negada !";
            return view('redflags.dispute_list', $dados);
        }
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
            $dados['aprovadasPage'] = false;
            return view('redflags.list', $dados);
        }
    }
        //abrir redfalg moderador
    public function analisar(Request $request){
        if(session()->get('user')->tipoUsuario != Enuns::admin)
            return redirect()->route('dashboard');
        $id = $request->id;
        $r = new RedFlag();
        $dados['redflag'] = $r->getRedFlagOwner($id);
        $dados['id'] = $id;
        return view('redflags.visualizar', $dados);
    }
    public function aprovar(Request $request){
        $r = new RedFlag();
        $idUser = session()->get('user')->id;
        $query = $r->aprovarRedFlag($request->id);
        if($query){
            $msg = "Red flag aprovada";
            return redirect()->route('redflag.visualizar', $idUser)->with('msg', $msg);
        }else{
            $msg = "Erro ao aprovar Red Flag";
            return redirect()->route('redflag.visualizar', $idUser)->with('msg', $msg);
        }
    }

    public function negar(Request $request){
        $r = new RedFlag();
        $idUser = session()->get('user')->iduser;
        $query = $r->negarRedFlag($request->id, $idUser);
        if($query){
            $msg = "Red flag Negada";
            return redirect()->route('redflag.visualizar', $idUser)->with('msg', $msg);
        }else{
            $msg = "Erro ao Negar Red Flag";
            return redirect()->route('redflag.visualizar', $idUser)->with('msg', $msg);
        }
    }

    public function formDispute(Request $request){
        $idRedFlag = $request->id;
        $dados['redflag'] = RedFlag::where('id', '=', $idRedFlag)->get();
        return view('redflags.dispute', $dados);
    }

    public function formDispute_send(Request $request){
        $data = $request->all();
        $idRedFlag = $request->idRedflag;
        $data['id_redflag'] = $idRedFlag;
        unset($data['_token']);

        $regras = [
            'descricao' => 'required|max:255',
        ];
        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];

        $this->validate($request, $regras, $msgError);
        $user = session()->get('user')->id;

        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
            $name = sha1(time()) . "_$idRedFlag";
            $extension = $request->arquivo->extension();
            $nameFile = "$name.$extension";
            $data['arquivo'] = $nameFile;
            $upload = $request->arquivo->storeAs('public/uploads/dispute', $nameFile);
            if(!$upload){
                $msg = "Falha ao enviar iamgem";
                return redirect()->route('redflag.visualizar',  session()->get('user')->id)->with('msg', $msg);
            }
        }
        $r = new RedFlag();
        $query = $r->saveDispute($data);
        if($query){
            $msg = "Dispute enviada com sucesso !";
            return redirect()->route('redflag.visualizar', session()->get('user')->id)->with('msg', $msg);
        }
    }
}
