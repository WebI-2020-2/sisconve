<?php
include_once './../app/Controllers/FornecedorController.php';
foreach ($dados['fornecedores'] as $fornecedor) : ?>
        <?= $fornecedor->nome_fornecedor ?>
<?php endforeach ?>