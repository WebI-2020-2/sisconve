<?php
include_once './../app/Controllers/PagamentoCompraController.php';
foreach ($dados['pagamentoCompras'] as $pagamentoCompra) : ?>
        <?= $pagamentoCompra->id_pagamento_compra ?>
<?php endforeach ?>