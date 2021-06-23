<?php
class PagamentoCompraController extends Controller
{
    public function __construct()
    {
        $this->pagamentoCompraModel = $this->model('PagamentoCompraModel');
    }

    public function index(){
        
    }
    public function listarPagamentoCompra(){
        $dados =[
            'pagamentoCompras' => $this->pagamentoCompraModel->selectAll()
        ];
        $this->view('pagamentoCompra/listarpagamentoCompras', $dados);
    }
}
