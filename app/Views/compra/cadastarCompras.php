<?php
include './../app/Models/CategoriaModel.php';
include './../app/Models/FuncionarioModel.php';

$categoria = new CategoriaModel();
$lista_categorias = $categoria->selectAll();

$fornecedor = new FornecedorModel();
$lista_fornecedor = $fornecedor->selectAll();

$funcionario = new FuncionarioModel();
$lista_funcionario = $funcionario->selectAll();

?>


<form name="cadastrar" action="<?= URL ?>/CompraController/cadastrar" method="post" class="text-center">

    <!-- Compra -->
    <label for="">Fornecedor</label>
    <select name="fornecedor" id="fornecedor">
        <?php foreach ($lista_fornecedor as $fornecedores) : ?>
            <option value="<?= $fornecedores->id_fornecedor ?>"><?= $fornecedores->nome_fornecedor ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="">Funcionario</label>
    <select name="funcionario" id="funcionario">
        <?php foreach ($lista_funcionario as $funcionarios) : ?>
            <option value="<?= $funcionarios->id_funcionario ?>"><?= $funcionarios->nome_funcionario ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <!-- //////////////////////////// -->
    <label for="">Parcelas</label>
    <input type="text" name="parcelas" id="parcelas">

    <br>



    <!-- Produto -->


    <label for="">Nome do produto</label>
    <input type="text" name="nome_produto" id="nome_produto">

    <br>
    <label for="">Categoria</label>
    <select name="categoria" id="categoria">
        <?php foreach ($lista_categorias as $categorias) : ?>
            <option value="<?= $categorias->id_categoria ?>"><?= $categorias->nome_categoria ?></option>
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