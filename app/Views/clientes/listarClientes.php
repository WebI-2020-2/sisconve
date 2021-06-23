<?php
include_once './../app/Controllers/ClientesController.php';
foreach ($dados['clientes'] as $cliente) : ?>
        <?= $cliente->id_cliente ?>
        <?= $cliente->nome_cliente ?>
        <?= $cliente->cpf ?>
        <?= $cliente->credito ?>
        <?= $cliente->debito ?>
        <?= $cliente->criado_em ?>
<?php endforeach ?>