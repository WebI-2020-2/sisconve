<?php
include_once './../app/Controllers/ProdutosController.php';
foreach ($dados['produtos'] as $produto) : ?>
        <?= $produto->nome_produto ?>
<?php endforeach ?>