<?php
class PagamentoVendaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
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