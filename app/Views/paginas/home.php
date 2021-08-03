<?php

if (!Sessao::estaLogado()) :
    header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
    // URL::redirecionar('FuncionarioController/login');
else :
    header("Location:".URL.DIRECTORY_SEPARATOR.'DashboardController/dashboard');
    // URL::redirecionar('CategoriaController/listarCategoria');
endif;
