<?php
class VendaController extends Controller
{
    public function __construct()
    {
        $this->vendaModel = $this->model('VendaModel');
    }

    public function index(){
        
    }
    public function listarvenda(){
        $dados =[
            'vendas' => $this->vendaModel->selectAll()
        ];
        $this->view('venda/listarVendas', $dados);
    }
}