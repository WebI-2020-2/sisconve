<?php
include './../app/Models/FuncionarioModel.php';
$fornecedor = new FornecedorModel();
$lista_fornecedor = $fornecedor->selectAll();

$funcionario = new FuncionarioModel();
$lista_funcionario = $funcionario->selectAll();

$produto = new ProdutoModel();
$lista_produtos = $produto->selectAll();
?>

<form name="cadastrar" action="<?= URL ?>/CompraController/CompraComProduto" method="post" class="text-center">

    <!-- Compra -->

    <label for="">Funcionario</label>
    <select name="funcionario" id="funcionario">
        <?php foreach ($lista_funcionario as $funcionarios) : ?>
            <option value="<?= $funcionarios->id_funcionario ?>"><?= $funcionarios->nome_funcionario ?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <label for="">Parcelas</label>
    <input type="text" name="parcelas" id="parcelas">

    <br>

    <!-- Produto -->
    <label for="">Produto</label>
    <select name="produto" id="produto">
        <?php foreach ($lista_produtos as $produtos) : ?>
            <option value="<?= $produtos->id_produto ?>"><?= $produtos->nome_produto ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <!-- item_compra -->
    <label for="">Ipi</label>
    <input type="text" name="ipi" id="ipi">

    <br>

    <label for="">Frete</label>
    <input type="text" name="frete" id="frete">

    <br>

    <label for="">Icms</label>
    <input type="text" name="icms" id="icms">

    <br>

    <label for="">Quantidade</label>
    <input type="text" name="quantidade" id="quantidade">

    <br>

    <label for="">Preco de compra</label>
    <input type="text" name="preco_compra" id="preco_compra">

    <br>
    <input type="submit" value="Comprar" class="btn btn-primary">


</form>
