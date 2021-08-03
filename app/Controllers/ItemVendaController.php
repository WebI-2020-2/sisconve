<?php
class ItemVendaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->itemVendaModel = $this->model('ItemVendaModel');
    }

    public function index(){
        
    }
    public function listarItemVenda(){
        $dados =[
            'itensVenda' => $this->itemVendaModel->selectAll()
        ];
        $this->view('itemVenda/listarItensVenda', $dados);
    }
}
