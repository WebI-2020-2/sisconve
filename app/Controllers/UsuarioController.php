<?php

class UsuarioController extends Controller
{    
    public function cadastrar(){

        echo 'carregou cadastrar';
        
        $this->view('usuarios/cadastrar');
    }
    
}