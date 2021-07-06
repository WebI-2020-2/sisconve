<?php

foreach ($dados['fornecedorListar'] as $fornecedor):
    echo $fornecedor->id_fornecedor;
    echo '<br />';
    echo $fornecedor->nome_fornecedor;
    echo '<br />';
    echo $fornecedor->telefone;
    echo '<br />';
    echo $fornecedor->cidade;
    echo '<br />';
    echo $fornecedor->estado;
    echo '<br />';
    echo Validar::dataBr($fornecedor->criado_em);
    
endforeach;
