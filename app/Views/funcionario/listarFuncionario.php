<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Funcionários</title>
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-funcionario.css">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo-->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <?php //Sessao::mensagem('funcionario') ?>

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php") ?>

        <div class="content-center">
            <!-- conteudo do centro -->
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
                            <img src="../public/img/funcionario-dark.svg" alt="Funcionario">
                            Funcionários
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um funcionário">
                            <img src="../public/img/search-icon.svg" alt="Search">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-funcionario-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar funcionario">
                            Cadastrar Funcionário
                        </button>

                        <!-- modal para cadastro do funcionario -->
                        <?php include('./../app/include/modal/cadastrar-funcionario-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Funcionário</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th>
                                    <th>Nivel de Acesso</th>
                                    <th>Salario</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['funcionarios'] as $funcionario) : ?>
                                    <tr>
                                        <td><?= $funcionario->id_funcionario ?></td>
                                        <td><?= $funcionario->nome_funcionario ?></td>
                                        <td><?= $funcionario->telefone ?></td>
                                        <td><?= $funcionario->cargo ?></td>
                                        <td><?= $funcionario->nivel_acesso ?></td>
                                        <td>R$ <?= Validar::lucro($funcionario->salario) ?></td>
                                        
                                        <td>
                                            <button title="Ver funcionario" onclick="">
                                                <img src="../public/img/eye-icon.svg" alt="Ver funcionario">
                                            </button>
                                            <button title="Editar funcionario" onclick="">
                                                <img src="../public/img/pencil-icon.svg" data-toggle="modal" data-target="#editar-funcionario-modal" alt="Editar funcionario">
                                            </button>
                                            <button title="Exluir funcionario" onclick="deletefuncionario('<?= $funcionario->id_funcionario ?>', '<?= $funcionario->nome_funcionario ?>')">
                                                <img src="../public/img/trash-icon.svg" alt="Excluir funcionario">
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

<?php include("./../app/include/etc/scripts.php"); ?>
<script src="../public/js/checkerLogin.js"></script>
</html>