<?php
class ItemCompraController extends Controller
{
    public function __construct()
    {
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
}
