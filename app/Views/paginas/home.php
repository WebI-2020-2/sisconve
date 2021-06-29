<?php

if (!Sessao::estaLogado()) :
    header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
    // URL::redirecionar('UsuarioController/login');
else :
     header("Location:".URL.DIRECTORY_SEPARATOR.'CategoriaController/listarCategoria');
    URL::redirecionar('CategoriaController/listarCategoria');
endif;
