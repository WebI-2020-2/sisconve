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
        $dia = date('d');
        $produtosAbaixoEstoque = $this->dashboardModel->produtoAbaixoEstoque();
        $clientesParcelaVencendo = $this->dashboardModel->clienteParcelaVencendo($hoje);
        $totaldeClientes = $this->dashboardModel->totaldeClientes();
        $mediadeLucroDia = $this->dashboardModel->mediadeLucroDia($dia);


        $dados = [
            'produtoAbaixoEstoque' => $produtosAbaixoEstoque,
            'clienteParcelaVencendo' => $clientesParcelaVencendo,
            'totaldeClientes' => $totaldeClientes,
            'mediadeLucroDia' => $mediadeLucroDia
        ];


        $this->view('dashboard/dashboard', $dados);
    }
}