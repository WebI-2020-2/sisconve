<?php
include_once './../app/Controllers/CategoriaController.php';
foreach ($dados['categorias'] as $categoria) : ?>
        <?= $categoria->nome_categoria ?>
<?php endforeach ?>