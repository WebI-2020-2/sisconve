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
            'Sobre' => APP_NOME
        ];

        $this->view('paginas/sobre', $dados);
    }   
    public function cadastrar(){
        $dados = [
            'Cadastrar' => APP_NOME
        ];

        $this->view('usuarios/cadastrar', $dados);
    }  
    public function login(){
        $dados = [
            'Login' => APP_NOME
        ];

        $this->view('usuarios/login', $dados);
    }   
    
}