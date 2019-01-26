<?php

namespace App\Http\Controllers;

use App\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index(){
        $dados['msg'] = null;
        $t = new Tutorial();
        $dados['tutorials'] = $t->getTutorials();
        return view('tutorial.tutorial_list', $dados);
    }
}
