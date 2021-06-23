<?php
class ItemVendaController extends Controller
{
    public function __construct()
    {
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
