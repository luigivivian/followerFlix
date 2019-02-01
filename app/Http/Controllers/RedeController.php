<?php

namespace App\Http\Controllers;

use App\Rede;
use App\Usuario;
use Illuminate\Http\Request;

class RedeController extends Controller
{
    public function getLiders(){ //retorna vetor com os lideres da rede
        $r = new Rede();
        $liders = $r->getLiders();
        $lideresAtuais = array();
        for ($i = 0; $i < count($liders); $i++){
            array_push($lideresAtuais, $liders[$i]->id);
        }
        return $lideresAtuais;
    }

    public function getShuffledLideres(){ //embaralha os lideres da rede
        $l = $this->getLiders();
        $isShuffled = shuffle($l);
        if($isShuffled){
            return $l;
        }else{
            return "Erro ao embaralhar lideres";
        }
    }


    public function teste(){
        $s = new ServicoController();
        $u = new Usuario();
        $getContratos = $u->getContratos('luigivivian@hotmail.com');
        if(count($getContratos) < 10){
            $total = count($getContratos) - 10;
        }
        return count($getContratos);
    }

    public function getNodoInicial(){
        $r = new Rede();
        $query = $r->getNodoInicial();
        return $query;
    }
}
