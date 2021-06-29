<?php
class FormaPagamentoController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
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
