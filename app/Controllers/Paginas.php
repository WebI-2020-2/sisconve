<?php

class Paginas extends Controller {

    public function index(){
        $dados = [
            'tituloPagina' => 'Página Inicial'
        ];

        $this->view('paginas/home', $dados);
    }

    public function sobre(){
        $dados = [
            'tituloPagina' => APP_NOME
        ];

        $this->view('paginas/sobre', $dados);
    }   
    public function cadastrar(){
        $dados = [
            'tituloPagina' => APP_NOME
        ];

        $this->view('usuarios/cadastrar', $dados);
    }   
}