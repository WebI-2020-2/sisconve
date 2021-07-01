<?php
class ItemVendaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
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
