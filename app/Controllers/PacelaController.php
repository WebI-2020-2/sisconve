<?php
class ParcelaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
        $this->parcelaModel = $this->model('ParcelaModel');
    }

    public function index(){
        
    }
    public function listarparcela(){
        $dados =[
            'parcelas' => $this->parcelaModel->selectAll()
        ];
        $this->view('parcela/listarparcelas', $dados);
    }
}