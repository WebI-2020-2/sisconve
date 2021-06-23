<?php
class CaixaController extends Controller
{
    public function __construct()
    {
        $this->caixaModel = $this->model('CaixaModel');
    }

    public function index(){
        
    }
    public function listarCaixa(){
        $dados =[
            'caixas' => $this->CaixaModel->selectAll()
        ];
        $this->view('caixa/listarCaixas', $dados);
    }
}
