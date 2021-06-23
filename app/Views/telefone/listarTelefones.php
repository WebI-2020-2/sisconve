<?php
include_once './../app/Controllers/TelefoneController.php';
foreach ($dados['telefones'] as $telefone) : ?>
        <?= $telefone->num_telefone ?>
<?php endforeach ?>