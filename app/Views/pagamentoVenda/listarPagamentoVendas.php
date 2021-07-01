<?php
include_once './../app/Controllers/PagamentoVendaController.php';
foreach ($dados['pagamentoVendas'] as $pagamentoVenda) : ?>
        <?= $pagamentoVenda->id_pagamento_venda ?>
<?php endforeach ?>