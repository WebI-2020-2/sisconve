<?php
// include_once './../app/Controllers/ClientesController.php';

foreach ($dados['clientes'] as $cliente) : ?>
        <?= $cliente->id_cliente ?>
        <?= $cliente->nome_cliente ?>
        <?= $cliente->cpf ?>
        <?= $cliente->credito ?>
        <?= $cliente->ddd ?>
        <?= $cliente->num_telefone ?>
        <?= $cliente->whatsapp ?>
        <?= $cliente->rua ?>
        <?= $cliente->bairro ?>
        <?= $cliente->cidade ?>
        <?= $cliente->estado ?>
        <?= $cliente->numero ?>
        <?= $cliente->criado_em ?>
<?php endforeach ?>

