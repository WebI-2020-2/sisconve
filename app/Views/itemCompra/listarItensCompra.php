<?php
include_once './../app/Controllers/ItemCompraController.php';
foreach ($dados['itensCompra'] as $itemCompra) : ?>
        <?= $itemCompra->id_item_compra ?>
<?php endforeach ?>