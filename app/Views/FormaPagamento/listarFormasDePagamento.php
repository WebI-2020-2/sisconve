<?php
include_once './../app/Controllers/FormaPagamentoController.php';
foreach ($dados['FormasDePagamento'] as $formaPagamento) : ?>
        <?= $formaPagamento->id_forma_pagamento ?>
<?php endforeach ?>