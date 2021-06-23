<?php
include_once './../app/Controllers/UsuarioController.php';
foreach ($dados['usuarios'] as $usuario) : ?>
        <?= $usuario->nome_completo ?>
<?php endforeach ?>