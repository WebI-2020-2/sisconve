<?php
include_once './../app/Controllers/DevolucaoController.php';
foreach ($dados['devolucoes'] as $devolucao) : ?>
        <?= $devolucao->id_devolucao ?>
        <?= $devolucao->id_produto ?>
        <?= $devolucao->id_item_venda ?>
        <?= $devolucao->motivo_devolucao ?>
        <?= $devolucao->quantidade ?>
        <?= $devolucao->criado_em ?>
<?php endforeach ?>