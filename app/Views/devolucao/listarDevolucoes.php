<?php
include_once './../app/Controllers/DevolucaoController.php';
foreach ($dados['devolucoes'] as $devolucao) : ?>
        <?= $devolucao->id_devolucao ?>
<?php endforeach ?>