<?php
class EnderecoController extends Controller
{
    public function __construct()
    {
        $this->enderecoModel = $this->model('EnderecoModel');
    }

    public function index(){
        
    }
    public function listarCompras(){
        $dados =[
            'enderecos' => $this->enderecoModel->selectAll()
        ];
        $this->view('endereco/listarEnderecos', $dados);
    }


    public function cadastrar()
    {
        
    }
}
