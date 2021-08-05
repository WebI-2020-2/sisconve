<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Caixa</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-caixa.css">
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <?= Sessao::mensagem('caixa') ?>
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
                            <img src="../public/img/a.svg" alt="Caixa">
                            Caixa
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um caixa">
                            <img src="../public/img/search-icon.svg" alt="">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-caixa-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar caixa">
                            Adicionar Caixa
                        </button>

                        <!-- modal para cadastro de caixas -->
                        <?php //include('./../app/include/modal/cadastrar-caixa-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Valor em caixa</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['caixas'] as $caixa) : ?>
                                    <tr>
                                        <td><?= $caixa->id_caixa ?></td>
                                        <td>descrição</td>
                                        <td>R$ <?= Validar::lucro($caixa->valor_em_caixa) ?></td>
                                        <td><?= $caixa->status ? 'ATIVO': 'INATIVO' ?></td>
                                        <td>
                                            <button title="Ver caixa" onclick="">
                                                <img src="<?= URL ?>/public/img/eye-icon.svg" alt="Ver caixa">
                                            </button>
                                            <button title="Editar caixa" onclick="">
                                                <img src="<?= URL ?>/public/img/pencil-icon.svg" data-toggle="modal" data-target="#editar-caixa-modal" alt="Editar caixa">
                                            </button>
                                            <!-- <button title="Exluir caixa" onclick="deleteCaixa('<?= $caixa->id_caixa ?>', '<?= $caixa->nome_caixa ?>')"> -->
                                            <button title="Exluir caixa">
                                                <img src="<?= URL ?>/public/img/trash-icon.svg" alt="Excluir caixa">
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <?php //include('./../app/include/modal/editar-caixa-modal.php'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php"); ?>

</html>