<?php
include_once './../app/Controllers/ClientesController.php';
foreach ($dados['clientes'] as $cliente) : ?>
        <?= $cliente->nome_cliente ?>
<?php endforeach ?>