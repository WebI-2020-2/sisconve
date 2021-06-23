<?php

class Paginas extends Controller {

    //Application pages
    public function index(){
        $dados = [
            'tituloPagina' => 'Página Inicial'
        ];

        $this->view('paginas/home', $dados);
    }
}