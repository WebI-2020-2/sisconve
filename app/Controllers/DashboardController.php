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
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');
        $dia = date('d');
        $produtosAbaixoEstoque = $this->dashboardModel->produtoAbaixoEstoque();
        $clientesParcelaVencendo = $this->dashboardModel->clienteParcelaVencendo($hoje);
        $totaldeClientes = $this->dashboardModel->totaldeClientes();
        $mediadeLucroDia = $this->dashboardModel->mediadeLucroDia($dia);
        $totalVendaDia = $this->dashboardModel->totalVendaDia($dia);

        $dados = [
            'produtoAbaixoEstoque' => $produtosAbaixoEstoque,
            'clienteParcelaVencendo' => $clientesParcelaVencendo,
            'totaldeClientes' => $totaldeClientes,
            'mediadeLucroDia' => $mediadeLucroDia, 
            'totalVendaDia' => $totalVendaDia
        ];


        $this->view('dashboard/dashboard', $dados);
    }
}