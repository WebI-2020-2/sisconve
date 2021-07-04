<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Clientes</title>
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php") ?>

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
                            <img src="../public/img/people-icon.svg" alt="Clientes">
                            Clientes
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um cliente">
                            <img src="../public/img/search-icon.svg" alt="">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar cliente">
                            Cadastrar Cliente
                        </button>

                        <!-- modal cadastro de cliente -->
                        <?php include('./../app/include/modal/cadastrar-cliente-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Cliente</th>
                                    <th>Contato</th>
                                    <th>CPF</th>
                                    <th>Crédito</th>
                                    <th>Debito</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['clientes'] as $cliente) : ?>
                                    <tr>
                                        <td><?= $cliente->id_cliente ?></td>
                                        <td><?= $cliente->nome_cliente ?></td>
                                        <td>(<?= $cliente->ddd ?>) <?= $cliente->num_telefone ?></td>
                                        <td><?= $cliente->cpf ?></td>
                                        <td><?= $cliente->credito ?></td>
                                        <td><?= $cliente->debito ?></td>
                                        <td>
                                            <button title="Ver cliente" onclick="">
                                                <img src="<?= URL ?>/public/img/eye-icon.svg" alt="">
                                            </button>
                                            <button title="Editar cliente" onclick="">
                                                <img src="<?= URL ?>/public/img/pencil-icon.svg" alt="">
                                            </button>
                                            <button title="Exluir cliente" onclick="deleteCliente('<?= $cliente->id_cliente ?>', '<?= $cliente->nome_cliente ?>')">
                                                <img src="<?= URL ?>/public/img/trash-icon.svg" alt="">
                                            </button>
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

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php"); ?>

</html>