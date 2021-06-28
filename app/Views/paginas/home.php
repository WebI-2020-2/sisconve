<?php

if (!Sessao::estaLogado()) :
    URL::redirecionar('UsuarioController/login');
else :
    URL::redirecionar('pages/produtos');
endif;
