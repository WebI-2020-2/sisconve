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
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por uma compra">
                            <img src="../public/img/search-icon.svg" alt="Search">
                        </div>
                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comprado por</th>
                                    <th>Fornecedor</th>
                                    <th>Valor total</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['compras'] as $compra) : ?>
                                    <tr id="item-details">
                                        <td><?= $compra->id_compra ?></td>
                                        <td><?= $compra->nome_funcionario ?></td>
                                        <td><?= $compra->nome_fornecedor ?></td>
                                        <td><?= Validar::lucro($compra->valor_total) ?></td>
                                        <td><?= Validar::dataBr($compra->data_compra) ?></td>
                                        <td>
                                            <a title="Ver compra" href="#">
                                                <img src="../public/img/eye-icon.svg" alt="">
                                            </a>
                                            <a title="Editar compra" href="#">
                                                <img src="../public/img/pencil-icon.svg" alt="">
                                            </a>
                                            <a title="Exluir compra" href="#">
                                                <img src="../public/img/trash-icon.svg" alt="">
                                            </a>
                                            <a href="<?= URL?>/CompraController/visualizar/<?= $compra->id_compra ?>">TESTE</a>
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

<?php include("./../app/include/etc/scripts.php"); ?>

</html>