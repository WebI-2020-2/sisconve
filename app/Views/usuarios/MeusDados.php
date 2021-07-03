<?php


foreach ($dados['usuariosListar'] as $usuario):
    echo $usuario->id_usuario;
    echo $usuario->nome_completo;
endforeach;
