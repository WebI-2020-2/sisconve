<?php

foreach ($dados['produtosListar'] as $produtos) :
    echo $produtos->id_produto;
    echo '<br>';
    echo $produtos->nome_produto;
    echo '<br>';
    echo $produtos->nome_categoria;
    echo '<br>';
    echo $produtos->icms;
    echo '<br>';
    echo $produtos->ipi;
    echo '<br>';
    echo $produtos->frete;
    echo '<br>';
    echo $produtos->preco_compra;
    echo '<br>';
    echo $produtos->preco_na_fabrica;
    echo '<br>';
    echo $produtos->preco_venda;
    echo '<br>';
    echo $produtos->lucro;
    echo '<br>';
    echo $produtos->desconto;
    echo '<br>';
    echo $produtos->quantidade;

endforeach;
