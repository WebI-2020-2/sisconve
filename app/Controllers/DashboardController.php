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
        $hoje = date('Y-m-d');

        $produtosAbaixoEstoque = $this->dashboardModel->produtoAbaixoEstoque();
        $clientesParcelaVencendo = $this->dashboardModel->clienteParcelaVencendo($hoje);
        

        $dados = [
            'produtoAbaixoEstoque' => $produtosAbaixoEstoque,
            'clienteParcelaVencendo' => $clientesParcelaVencendo
        ];


        $this->view('dashboard/dashboard', $dados);
    }
}