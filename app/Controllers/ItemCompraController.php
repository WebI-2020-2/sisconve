<?php
class ItemCompraController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->itemCompraModel = $this->model('ItemCompraModel');
    }

    public function index(){
        
    }
    public function listarItemCompra(){
        $dados =[
            'itensCompra' => $this->itemCompraModel->selectAll()
        ];
        $this->view('itemCompra/listarItensCompra', $dados);
    }
    public function cadastra()
    {
        $this->view('itemCompra/CadastarItemCompra');
    }
}
