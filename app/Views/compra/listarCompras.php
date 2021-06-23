<?php
include_once './../app/Controllers/CompraController.php';
foreach ($dados['compras'] as $compra) : ?>
        <?= $compra->id_compra ?>
<?php endforeach ?>