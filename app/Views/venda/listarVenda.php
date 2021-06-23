<?php
include_once './../app/Controllers/VendaController.php';
foreach ($dados['vendas'] as $venda) : ?>
        <?= $venda->id_venda ?>
<?php endforeach ?>