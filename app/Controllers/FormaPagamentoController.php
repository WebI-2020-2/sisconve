<?php
class FormaPagamentoController extends Controller
{
    public function __construct()
    {
        $this->formaPagamentoModel = $this->model('FormaPagamentoModel');
    }

    public function index(){
        
    }
    public function listarCompras(){
        $dados =[
            'formasDePagamento' => $this->formaPagamentoModel->selectAll()
        ];
        $this->view('formaPagamento/listarFormasDePagamento', $dados);
    }
}
