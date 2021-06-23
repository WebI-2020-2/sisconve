<?php
include_once './../app/Controllers/EnderecoController.php';
foreach ($dados['enderecos'] as $endereco) : ?>
        <?= $endereco->cidade ?>
<?php endforeach ?>