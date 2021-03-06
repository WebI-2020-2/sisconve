<?php
class PagamentoCompraController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
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
