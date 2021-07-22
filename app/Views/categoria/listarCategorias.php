<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Categorias</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-categoria.css">
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <?= Sessao::mensagem('categoria') ?>
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
                            <img src="../public/img/categoria-dark.svg" alt="Categorias">
                            Categorias
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por uma categoria">
                            <img src="../public/img/search-icon.svg" alt="">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-categoria-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar categoria">
                            Adicionar Categoria
                        </button>

                        <!-- modal para cadastro de categorias -->
                        <?php include('./../app/include/modal/cadastrar-categoria-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome da Categoria</th>
                                    <th>Quantidade de Produtos</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['categorias'] as $categoria) : ?>
                                    <tr>
                                        <td><?= $categoria->id_categoria ?></td>
                                        <td><?= $categoria->nome_categoria ?></td>
                                        <td><?= $categoria->qunatidade_categoria ?></td>
                                        
                                        <td>
                                            <button title="Ver categoria" onclick="">
                                                <img src="<?= URL ?>/public/img/eye-icon.svg" alt="">
                                            </button>
                                            <button title="Editar categoria" onclick="">
                                                <img src="<?= URL ?>/public/img/pencil-icon.svg" alt="">
                                            </button>
                                            <button title="Exluir categoria" onclick="deleteCategoria('<?= $categoria->id_categoria ?>', '<?= $categoria->nome_categoria ?>')">
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