<?php
include_once './../app/Controllers/EnderecoController.php';
foreach ($dados['enderecos'] as $endereco) : ?>
        <?= $endereco->id_endereco ?>
        <?= $endereco->id_cliente ?>
        <?= $endereco->rua ?>
        <?= $endereco->bairro ?>
        <?= $endereco->cidade ?>
        <?= $endereco->estado ?>
        <?= $endereco->numero ?>
        <?= $endereco->criado_em ?>
<?php endforeach ?>