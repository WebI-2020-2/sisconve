<?php

foreach ($dados['comprasListar'] as $compras): 
    echo $compras->id_compra;
    echo '<br>';

    echo $compras->nome_funcionario;
    echo '<br>';

    echo $compras->nome_fornecedor;
    echo '<br>';

    echo $compras->nome_produto;
    echo '<br>';

    echo $compras->valor_total;
    echo '<br>';

    echo $compras->ipi;
    echo '<br>';

    echo $compras->icms;
    echo '<br>';

    echo $compras->frete;
    echo '<br>';

    echo $compras->preco_compra;
    echo '<br>';

    echo $compras->quantidade;
    echo '<br>';

    echo Validar::dataBr($compras->quantidade);
    echo '<br>';
endforeach;


// compra.id_compra, funcionario.nome_funcionario,
// 			 fornecedor.nome_fornecedor, produto.nome_produto, compra.valor_total,
// 			 item_compra.ipi, item_compra.icms,
// 			 item_compra.frete, item_compra.preco_compra,
// 			 item_compra.quantidade, compra.data_compra