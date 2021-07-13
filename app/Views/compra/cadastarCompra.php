<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <title>SISCONVE - Compras</title>
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php"); ?>

    <div id="container">

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php"); ?>

        <div class="content-center">

            <div class="dashboard">
                <div class="title-content">
                    <div class="title-text">
                        <span>
                            <a href="<?= URL ?>/DashboardController/dashboard">
                                <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                                Dashboard
                            </a>
                        </span>
                        <span>/</span>
                        <span>
                            <img src="../public/img/car-compra.svg" alt="Compras">
                            Compras
                            <span>/</span>
                            Registrar compra
                        </span>
                    </div>
                </div>


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

                
            </div>

        </div>

    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>

</html>
















