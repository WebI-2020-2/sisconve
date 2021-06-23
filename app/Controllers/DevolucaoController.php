<?php
class DevolucaoController extends Controller
{
    public function __construct()
    {
        $this->devolucaoModel = $this->model('DevolucaoModel');
    }

    public function index(){
        
    }
    public function listardevolucaos(){
        $dados =[
            'devolucoes' => $this->devolucaoModel->selectAll()
        ];
        $this->view('devolucao/listardevolucoes', $dados);
    }
}
