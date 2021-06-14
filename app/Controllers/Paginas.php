<?php

class Paginas extends Controller {

    //Application pages
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
    //users pages
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

    //Products pages
    public function cadastrarProdutos(){
        $dados = [
            'Cadastrar Produtos' => APP_NOME
        ];

        $this->view('produtos/cadastrarProdutos', $dados);
    } 
    public function cadastrarCategoria(){
        $dados = [
            'Cadastrar Produtos' => APP_NOME
        ];

        $this->view('categoria/cadastrarCategoria', $dados);
    } 

    //Employee pages
    public function cadastrarFuncionario(){
        $dados = [
            'Cadastrar Produtos' => APP_NOME
        ];

        $this->view('funcionario/cadastrarFuncionario', $dados);
    }

    // Client pages
    public function cadastraClientes() 
    {
        $dados = [
            "Cadastar Clientes" => APP_NOME
        ];

        $this->view('clientes/cadastraClientes', $dados);
    }
}