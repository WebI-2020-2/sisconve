<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Vendas</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <?php include("../app/include/parts/navbar.php"); ?>

    <div id="container">

        <?php include("../app/include/parts/menubar.php"); ?>

        <div class="content-center">
            <div class="dashboard">
                <div class="title-content">
                    <div class="title-text">
                        <span>
                            <a href="./dashboard.php">
                                <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                                Dashboard
                            </a>
                        </span>
                        <span>/</span>
                        <span>
                            <img src="../public/img/car-compra.svg" alt="Vendas">
                            Vendas
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por uma venda">
                            <img src="../public/img/search-icon.svg" alt="Search">
                        </div>
                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Parcelas</th>
                                    <th>Valor total</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dados['vendas'] as $venda) : ?>
                                <tr>
                                    <td><?= $venda->id_venda ?></td>
                                    <!-- <td><?= $venda->id_caixa ?></td> -->
                                    <td><?= $venda->nome_cliente ?></td>
                                    <td><?= $venda->num_parcelas ?></td>
                                    <td><?= $venda->valor_total ?></td>
                                    <td><?= Validar::dataBr($venda->data_venda) ?></td>
                                    <td>
                                        <a title="Ver venda" href="#">
                                            <img src="../public/img/eye-icon.svg" alt="">
                                        </a>
                                        <a title="Editar venda" href="#">
                                            <img src="../public/img/pencil-icon.svg" alt="">
                                        </a>
                                        <a title="Exluir venda" href="#" onclick="deleteVenda(<?= $venda->id_venda ?>)">
                                            <img src="../public/img/trash-icon.svg" alt="">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php include("../app/include/etc/scripts.php"); ?>

</html>