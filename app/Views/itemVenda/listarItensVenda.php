<?php
include_once './../app/Controllers/ItemVendaController.php';
foreach ($dados['itensVenda'] as $itemVenda) : ?>
        <?= $itemVenda->id_item_Venda ?>
<?php endforeach ?>