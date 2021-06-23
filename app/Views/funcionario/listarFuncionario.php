<?php
include_once './../app/Controllers/FuncionarioController.php';
foreach ($dados['funcionarios'] as $funcionario) : ?>
        <?= $funcionario->nome_funcionario ?>
<?php endforeach ?>