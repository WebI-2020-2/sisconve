<?php
include_once './../app/Controllers/CaixaController.php';
foreach ($dados['caixas'] as $caixa) : ?>
        <?= $caixa->id_caixa ?>
<?php endforeach ?>