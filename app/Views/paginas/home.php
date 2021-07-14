<?php

if (!Sessao::estaLogado()) :
    header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
    // URL::redirecionar('UsuarioController/login');
else :
    header("Location:".URL.DIRECTORY_SEPARATOR.'DashboardController/dashboard');
    // URL::redirecionar('CategoriaController/listarCategoria');
endif;
