<?php
class DevolucaoController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
        $this->devolucaoModel = $this->model('DevolucaoModel');
    }

    public function index(){
        
    }
    public function listardevolucaos(){
        $dados =[
            'devolucoes' => $this->devolucaoModel->selectAll()
        ];
        $this->view('devolucao/listardevolucoes', $dados);
    }
}
