<?php
class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->telefoneModel = $this->model('TelefoneModel');
    }

    public function index(){
        
    }
    public function listarTelefone(){
        $dados =[
            'Telefones' => $this->telefoneModel->selectAll()
        ];
        $this->view('telefone/listarTelefones', $dados);
    }
}