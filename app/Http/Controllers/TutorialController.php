<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class TutorialController extends Controller
{
    public function index()
    {

        $t = new Tutorial();
        $dados['tutorials'] = $t->getTutorials();
        return view('tutorial.tutorial_list', $dados);
    }

    public function formTutorial(Request $request)
    {
        $id = $request->id;
        $t = new Tutorial();
        if($id){
            $dados['tutorial'] = $t->getTutorials($id);
            $dados['newTutorial'] = false;
        }else{
            $dados['newTutorial'] = true;
        }
        return view('tutorial.tutorial_edit',$dados);
    }

    public function newPost(Request $request){
        $regras = [
            'src' => 'required|max:255',
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255'
        ];
        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $dados = $request->all();
        $this->validate($request, $regras, $msgError);

        $t = new Tutorial();
        $total = strlen($dados['src']);
        $codVideo = explode('.be/', $dados['src'])[1];
        $t->src = "https://youtube.com/embed/".$codVideo;
        $t->titulo = $dados['titulo'];
        $t->descricao = $dados['descricao'];

        $query = $t->save($dados);
        if($query){
            $msg = "Tutorial adicionado";
            return redirect()->route('tutorial.list')->with('msg', $msg);
        }
    }
    public function editPost(Request $request){
        $id = $request->id;
        $regras = [
            'src' => 'required|max:255',
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255'
        ];
        $msgError = [
            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $dados = $request->all();
        $this->validate($request, $regras, $msgError);
        unset($dados['_token']);
        $query = Tutorial::where('id',$id)->update($dados);
        if($query){
            $msg = "Tutorial Editado";
            return redirect()->route('tutorial.list')->with('msg', $msg);
        }
    }

    public function delete(Request $request){
        $id = $request->id;
        Tutorial::find($id)->delete();
        return redirect()->back()->withErrors('Successfully deleted!');
    }
}