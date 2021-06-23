<?php
class PagamentoVendaController extends Controller
{
    public function __construct()
    {
        $this->pagamentoVendaModel = $this->model('PagamentoVendaModel');
    }

    public function index(){
        
    }
    public function listarPagamentoVenda(){
        $dados =[
            'pagamentoVendas' => $this->pagamentoVendaModel->selectAll()
        ];
        $this->view('pagamentoVenda/listarpagamentoVendas', $dados);
    }
}