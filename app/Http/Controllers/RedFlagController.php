<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedFlagController extends Controller
{
    //
    public function index(){

        $dados['redflags'] = 'null';
        return view('redflags.index', $dados);
    }
}
