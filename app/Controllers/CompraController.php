<?php
class CompraController extends Controller
{
    public function __construct()
    {
        $this->compraModel = $this->model('CompraModel');
    }

    public function index(){
        
    }
    public function listarCompras(){
        $dados =[
            'compras' => $this->compraModel->selectAll()
        ];
        $this->view('compra/listarCompras', $dados);
    }
}
