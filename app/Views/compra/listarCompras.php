<?php
include_once './../app/Controllers/CompraController.php';
foreach ($dados['compras'] as $compra) : ?>
        <?= $compra->id_compra ?>
        <?= $compra->id_funcionario ?>
        <?= $compra->id_fornecedor ?>
        <?= $compra->valor_total ?>
        <?= $compra->data_compra ?>
        <?= $compra->parcelas ?>
<?php endforeach ?>