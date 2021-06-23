<?php
include_once './../app/Controllers/ParcelaController.php';
foreach ($dados['parcelas'] as $parcela) : ?>
        <?= $parcela->id_parcela ?>
<?php endforeach ?>