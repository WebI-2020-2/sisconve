<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Clientes</title>
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-cliente.css">
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <?= Sessao::mensagem('cliente')?>
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
                                        <td>
                                            <?= $cliente->id_cliente ?>
                                        </td>
                                        <td><?= $cliente->nome_cliente ?></td>
                                        <td>(<?= $cliente->ddd ?>) <?= Validar::masc_tel($cliente->num_telefone) ?></td>
                                        <td><?= Validar::formatCpf($cliente->cpf) ?></td>
                                        <td>R$ <?= Validar::lucro($cliente->credito) ?></td>
                                        <td>R$ <?= Validar::lucro($cliente->debito) ?></td>
                                        <td>
                                            <button title="Ver cliente" onclick="">
                                                <img src="<?= URL ?>/public/img/eye-icon.svg" alt="">
                                            </button>
                                            <button title="Editar cliente" onclick="editCliente('<?= $cliente->id_cliente ?>')" data-toggle="modal" data-target="#editar-cliente-modal">
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

                        <?php include('./../app/include/modal/editar-cliente-modal.php'); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php"); ?>

<script>

    var clientes = [];

    <?php

        foreach ($dados['clientes'] as $cliente) { ?>
            clientes["<?= $cliente->id_cliente ?>"] = {
                id: "<?= $cliente->id_cliente ?>",
                nome: "<?= $cliente->nome_cliente ?>",
                cpf: "<?= $cliente->cpf ?>",
                ddd: "<?= $cliente->ddd ?>",
                telefone: "<?= $cliente->num_telefone ?>",
                rua: "<?= $cliente->rua ?>",
                numero: "<?= $cliente->numero ?>",
                bairro: "<?= $cliente->bairro ?>",
                cidade: "<?= $cliente->cidade ?>",
                estado: "<?= $cliente->estado ?>"
            }; <?php
        }

    ?>

    function editCliente(idCliente) {

        var editClientModal = document.getElementById("editar-cliente-modal");
        var clienteEdit;

        clientes.forEach(cliente => {
            if(cliente.id == idCliente){
                clienteEdit = cliente;
            }
        });

        var inputEdit = {
            id: editClientModal.querySelector("#id-cliente"),
            nome: editClientModal.querySelector("#nome"),
            cpf: editClientModal.querySelector("#cpf"),
            ddd: editClientModal.querySelector("#ddd"),
            telefone: editClientModal.querySelector("#telefone"),
            rua: editClientModal.querySelector("#rua"),
            numero: editClientModal.querySelector("#numero"),
            bairro: editClientModal.querySelector("#bairro"),
            cidade: editClientModal.querySelector("#cidade"),
            estado: editClientModal.querySelector("#estado")
        }

        inputEdit.id.value = clienteEdit.id;
        inputEdit.nome.value = clienteEdit.nome;
        inputEdit.cpf.value = clienteEdit.cpf;
        inputEdit.ddd.value = clienteEdit.ddd;
        inputEdit.telefone.value = clienteEdit.telefone;
        inputEdit.rua.value = clienteEdit.rua;
        inputEdit.numero.value = clienteEdit.numero;
        inputEdit.bairro.value = clienteEdit.bairro;
        inputEdit.cidade.value = clienteEdit.cidade;
        inputEdit.estado.value = clienteEdit.estado;
        
    }

</script>

</html>