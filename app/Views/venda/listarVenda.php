<?php
include_once './../app/Controllers/VendaController.php';
foreach ($dados['vendas'] as $venda) : ?>
        <?= $venda->id_venda ?>
        <?= $venda->id_caixa ?>
        <?= $venda->id_cliente ?>
        <?= $venda->num_parcelas ?>
        <?= $venda->valor_total ?>
        <?= $venda->data_venda ?>
<?php endforeach ?>