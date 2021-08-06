<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Clientes</title>
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-fornecedor.css">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo-->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <?php Sessao::mensagem('fornecedor') ?>

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
                            <img src="../public/img/truck-icon.svg" alt="Fornecedor">
                            Fornecedores
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um fornecedor">
                            <img src="../public/img/search-icon.svg" alt="Search">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-fornecedor-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar fornecedor">
                            Cadastrar Fornecedor
                        </button>

                        <!-- modal para cadastro do fornecedor -->
                        <?php include('./../app/include/modal/cadastrar-fornecedor-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Fornecedor</th>
                                    <th>Telefone</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['fornecedores'] as $fornecedor) : ?>
                                    <tr>
                                        <td><?= $fornecedor->id_fornecedor ?></td>
                                        <td><?= $fornecedor->nome_fornecedor ?></td>
                                        <td><?= Validar::masc_tel($fornecedor->telefone) ?></td>
                                        <td><?= $fornecedor->cidade ?></td>
                                        <td><?= $fornecedor->estado ?></td>
                                        <td>
                                            <button title="Ver fornecedor" onclick="">
                                                <img src="../public/img/eye-icon.svg" alt="Ver fornecedor">
                                            </button>
                                            <button title="Editar fornecedor" onclick="editFornecedor('<?= $fornecedor->id_fornecedor ?>')">
                                                <img src="../public/img/pencil-icon.svg" data-toggle="modal" data-target="#editar-fornecedor-modal" alt="Editar fornecedor">
                                            </button>
                                            <button title="Exluir fornecedor" onclick="deleteItem('<?= URL ?>', 'fornecedor', '<?= $fornecedor->id_fornecedor ?>', '<?= $fornecedor->nome_fornecedor ?>')">
                                                <img src="../public/img/trash-icon.svg" alt="Excluir fornecedor">
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <?php include('./../app/include/modal/editar-fornecedor-modal.php'); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>
<script>

    var fornecedores = [];

    <?php
    
        foreach ($dados['fornecedores'] as $fornecedor) { ?>
            fornecedores["<?= $fornecedor->id_fornecedor ?>"] = {
                id: "<?= $fornecedor->id_fornecedor ?>",
                nome: "<?= $fornecedor->nome_fornecedor ?>",
                telefone: "<?= $fornecedor->telefone ?>",
                cidade: "<?= $fornecedor->cidade ?>",
                estado: "<?= $fornecedor->estado ?>"
            }; <?php
        }

    ?>

    function editFornecedor(idFornecedor) {
        var editFornecedorModal = document.getElementById("editar-fornecedor-modal");
        var fornecedorEdit;

        fornecedores.forEach(fornecedor => {
            if(fornecedor.id == idFornecedor){
                fornecedorEdit = fornecedor;
            }
        });

        var inputEdit = {
            id: editFornecedorModal.querySelector("#id-fornecedor"),
            nome: editFornecedorModal.querySelector("#nome-fornecedor"),
            telefone: editFornecedorModal.querySelector("#telefone"),
            cidade: editFornecedorModal.querySelector("#cidade"),
            estado: editFornecedorModal.querySelector("#estado")
        }

        inputEdit.id.value = fornecedorEdit.id;
        inputEdit.nome.value = fornecedorEdit.nome;
        inputEdit.telefone.value = fornecedorEdit.telefone;
        inputEdit.cidade.value = fornecedorEdit.cidade;
        inputEdit.estado.value = fornecedorEdit.estado;

    }

</script>

</html>