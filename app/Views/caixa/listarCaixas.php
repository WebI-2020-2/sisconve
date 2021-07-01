<?php
include_once './../app/Controllers/CaixaController.php';
foreach ($dados['caixas'] as $caixa) : ?>
        <?= $caixa->id_caixa ?>
        <?= $caixa->id_funcionario ?>
        <?= $caixa->valor_em_caixa ?>
        <?= $caixa->status ?>
        <?= $caixa->criado_em ?>
<?php endforeach ?>