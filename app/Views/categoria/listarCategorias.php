<?php
include_once './../app/Controllers/CategoriaController.php';
foreach ($dados['categorias'] as $categoria) : ?>
        <?= $categoria->id_categoria ?>
        <?= $categoria->nome_categoria ?>
        <?= $categoria->criado_em ?>
<?php endforeach ?>