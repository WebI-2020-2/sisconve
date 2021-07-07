<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Produtos</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/modal/cadastro-produto.css">
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
                            <img src="../public/img/product-dark.svg" alt="Produto">
                            Produtos
                        </span>
                    </div>
                </div>

                <div class="item-area">
                    <div class="manage-item-top">
                        <div class="search-item">
                            <input id="search" onkeyup="search()" type="text" placeholder="Procure por um produto">
                            <img src="../public/img/search-icon.svg" alt="">
                        </div>

                        <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-produto-modal">
                            <img src="../public/img/adicionar-item.svg" alt="Adicionar produto">
                            Cadastrar Produto
                        </button>
                        <!-- modal para cadastro do produto -->
                        <?php include('./../app/include/modal/cadastrar-produto-modal.php'); ?>

                    </div>

                    <div class="table-item-area">
                        <table id="table-item">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados['produtos'] as $produto) : ?>
                                    <tr id="item-details">
                                        <td>
                                            <?= $produto->id_produto ?>
                                            <input value="<?= $produto->id_categoria ?>" style="display: none;">
                                        </td>
                                        <td><?= $produto->nome_produto ?></td>
                                        <td><?= $produto->nome_categoria ?></td>
                                        <td><?= $produto->preco_venda ?></td>
                                        <td><?= $produto->quantidade ?></td>
                                        <td>
                                            <button type="button" title="Ver produto" onclick="">
                                                <img src="../public/img/eye-icon.svg" alt="Ver produto">
                                            </button>
                                            <button type="button" title="Editar produto" onclick="editProduto(this)">
                                                <img src="../public/img/pencil-icon.svg" data-toggle="modal" data-target="#editar-produto-modal" alt="Editar produto">
                                            </button>
                                            <button type="button" title="Exluir produto" onclick="deleteProduto('<?= $produto->id_produto ?>', '<?= $produto->nome_produto ?>')">
                                                <img src="../public/img/trash-icon.svg" alt="Exluir produto">
                                            </button>
                                            <a href="<?= URL.'/ProdutosController/visualizar/'.$produto->id_produto ?>">TESTE</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <?php include('./../app/include/modal/editar-produto-modal.php'); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <div class="toast fade show bg-success" id="myToast" data-bs-autohide="true" data-bs-delay="1000" style="position: absolute; top: 14%; right: 1%;">
        <div class="d-flex">
            <div class="toast-body" style="color: white">
                Sucesso!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div> -->

</body>

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php") ?>

<script>

    var produtos = [];

    <?php

        foreach($dados['produtos'] as $produto) { ?>
            produtos["<?= $produto->id_produto ?>"] = {
                idCategoria: "<?= $produto->id_categoria ?>",
                nome: "<?= $produto->nome_produto ?>"
            }; <?php
        } 

    ?>

    function editProduto(idCategoria) {
        idCategoria = idCategoria.parentNode.parentNode.querySelector("input").value;

        var editProdutoModal = document.getElementById("editar-produto-modal");
        var produtoEdit;

        produtos.forEach(produto => {
            if(produto.idCategoria == idCategoria){
                produtoEdit = produto;
            }
        });

        var inputEdit = {
            nome: editProdutoModal.querySelector("#nome-produto"),
            categoria: editProdutoModal.querySelector("#categoria")
        }

        inputEdit.nome.value = produtoEdit.nome;
        inputEdit.categoria.value = produtoEdit.idCategoria;

    }

</script>

</html>