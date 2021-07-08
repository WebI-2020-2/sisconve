<?php 

foreach ($dados['clientesListar'] as $clientes):
    echo $clientes->id_cliente;
    echo '<br>';

    echo $clientes->nome_cliente;
    echo '<br>';

    echo $clientes->cpf;
    echo '<br>';

    echo $clientes->credito;
    echo '<br>';

    echo $clientes->debito;
    echo '<br>';

    echo $clientes->ddd;
    echo '<br>';

    echo $clientes->num_telefone;
    echo '<br>';

    echo $clientes->whatsapp;
    echo '<br>';

    echo $clientes->rua;
    echo '<br>';

    echo $clientes->bairro;
    echo '<br>';

    echo $clientes->cidade;
    echo '<br>';

    echo $clientes->estado;
    echo '<br>';
    
    echo $clientes->numero;
    echo '<br>';

    echo Validar::dataBr($clientes->criado_em);
    echo '<br>';    
endforeach;