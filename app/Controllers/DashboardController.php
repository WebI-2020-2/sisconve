<?php
class DashboardController extends Controller
{
    public function __construct()
    {

        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
        $this->dashboardModel = $this->model('DashboardModel');

    }

    public function dashboard()
    {

        $produtosAbaixoEstoque = $this->dashboardModel->produtoAbaixoEstoque();
        $dados = [
            'produtoAbaixoEstoque' => $produtosAbaixoEstoque
        ];


        $this->view('dashboard/dashboard', $dados);
    }
}