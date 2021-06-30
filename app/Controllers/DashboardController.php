<?php
class DashboardController extends Controller
{
    public function __construct()
    {

        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
        $this->caixaModel = $this->model('DashboardModel');

    }

    public function dashboard()
    {
         $this->view('dashboard/dashboard');
    }
}