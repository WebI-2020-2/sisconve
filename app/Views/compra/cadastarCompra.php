<?php

    $fornecedor = new FornecedorModel();
    $lista_fornecedor = $fornecedor->selectAll();

    $produto = new ProdutoModel();
    $lista_produtos = $produto->selectAll();

    include_once './../app/Models/FormaPagamentoModel.php';
    $formaPagamento = new FormaPagamentoModel();
    $lista_formaDePagamento = $formaPagamento->selectAll();
    
?>

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
    <link rel="stylesheet" href="../public/style/buy-products.css">
    <link rel="stylesheet" href="../public/style/modal/add-item.css">
</head>

<body>

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php"); ?>

    <div id="container">

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php"); ?>

        <div class="content-center">
            <div class="dashboard buy-page">
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

                <?php if($_POST) print_r($_POST); ?>

                <form action="<?= URL ?>/CompraController/cadastrarCompra" class="buy" method="POST">
                    <div class="buy-area">
                        <div class="section section-buy-area p-0 m-0">
                            <div class="title-section">
                                <h3>Lista de Produtos</h3>
                            </div>
                            <div class="table-section">
                                <table class="table-scroll m-0" id="table-items-compra">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Produto</th>
                                            <th>IPI</th>
                                            <th>ICMS</th>
                                            <th>Frete</th>
                                            <th>Quantidade</th>
                                            <th>Valor Unitário</th>
                                            <th>Valor Total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-items-compra"></tbody>
                                </table>
                            </div>
                            <div class="buy-info">
                                <div class="fornecedor">
                                <button type="button" id="btn" data-toggle="modal" data-target="#fornecedor-modal">
                                        <img src="../public/img/fornecedor.svg" alt="Fornecedor">
                                        Fornecedor
                                    </button>
                                    <div class="data-buy-info">
                                        <input type="text" id="name-fornecedor" value="SELECIONE UM FORNECEDOR" disabled>
                                    </div>
                                </div>

                                    <!-- modal para selecionar o fornecedor -->
                                    <div class="modal fade" id="fornecedor-modal" tabindex="-1" aria-labelledby="fornecedor-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header float-right">
                                                    <h5>Fornecedor</h5>
                                                    <div class="close-modal">
                                                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                                                    </div>
                                                </div>

                                                <div class="modal-select">
                                                    <label for="fornecedor">Selecione um fornecedor</label>
                                                    <select name="fornecedor" id="nome-fornecedor">
                                                        <option value="" selected disabled>SELECIONE UM FORNECEDOR</option>
                                                        <?php foreach ($lista_fornecedor as $fornecedor) : ?>
                                                            <option value="<?= $fornecedor->id_fornecedor?>"><?= $fornecedor->nome_fornecedor ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="confirm" data-dismiss="modal">
                                                        <img src="../public/img/check-icon.svg" alt="Confirmar">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim modal -->

                                <div class="payment">
                                    <button type="button" id="btn" data-toggle="modal" data-target="#payment-modal">
                                        <img src="../public/img/Meio-Pagamento.svg" alt="Metodo de Pagamento">
                                        Pagamento
                                    </button>
                                    <div class="data-buy-info">
                                        <input type="text" id="met-pag" value="À VISTA" disabled required>
                                    </div>
                                </div>

                                    <!-- modal para o metodo de pagamento -->
                                    <div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header float-right">
                                                    <h5>Método de Pagamento</h5>
                                                    <div class="close-modal">
                                                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                                                    </div>
                                                </div>

                                                <div class="modal-select d-flex">
                                                    <div class="input-met-pag">
                                                        <label for="metodo-pagamento">Selecione o método de pagamento</label>
                                                        <select name="metodo-pagamento" id="metodo-pagamento" required>
                                                            <option value="1" selected>À VISTA</option>
                                                            <?php foreach ($lista_formaDePagamento as $formaDePagamentos) : ?>
                                                                <option value="<?= $formaDePagamentos->id_forma_pagamento ?>"><?= $formaDePagamentos->tipo_pagamento ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-parcel">
                                                        <label for="num-parcelas">Número de parcelas</label>
                                                        <input type="number" name="num-parcelas" min="1" max="99" oninput="validaInput(this)" maxlength="2" value="1" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="confirm" data-dismiss="modal">
                                                        <img src="../public/img/check-icon.svg" alt="Confirmar">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim modal -->

                                <div class="add-product">
                                    <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                                        <img src="../public/img/adicionar-item.svg" alt="Adicionar Item">
                                        Adicionar Item
                                    </button>

                                    <!-- modal add-items -->
                                    <div class="modal fade" id="add-item-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-add-items-buy modal-dialog-centered">
                                            <div class="modal-content modal-content-add-items">
                                                <div class="modal-header float-right">
                                                    <h5>Adicionar um item a lista de compra</h5>
                                                    <div class="close-modal">
                                                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                                                    </div>
                                                </div>
                                                <div class="modal-select">
                                                    <div class="input-modal-add-item">
                                                        <div class="input-produt-quant">
                                                            <div class="input input-product">
                                                                <label>Nome do produto</label>
                                                                <select id="nome-produto" class="select name-product">
                                                                    <option value="" disabled selected>Selecione um produto</option>
                                                                    <?php foreach ($lista_produtos as $produtos) : ?>
                                                                        <option value="<?= $produtos->id_produto ?>"><?= Validar::upperCase($produtos->nome_produto) ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="input input-quant">
                                                                <label>Quantidade <small>(somente números)</small></label>
                                                                <input id="quantidade-item" oninput="validaInput(this)" class="quant-product" type="number" min="1" value="1">
                                                            </div>
                                                        </div>

                                                        <div class="input-frete-unidad">
                                                            <div class="input input-valor-unit">
                                                                <label>Valor R$ <strong>UNID</strong> <small>(somente números)</small></label>
                                                                <input id="valor-unit" oninput="validaInput(this)" class="valor-unit" type="number" step="0.1" min="0" value="0.00">
                                                            </div>
                                                            <div class="input input-frete">
                                                                <label>Valor R$ <strong>FRETE</strong> <small>(somente números)</small></label>
                                                                <input id="frete" oninput="validaInput(this)" class="frete" type="number" step="0.1" min="0" value="0.00">
                                                            </div>
                                                        </div>
                                                        <div class="input-ipi-icms">
                                                            <div class="input input-ipi">
                                                                <label>Valor R$ <strong>IPI</strong> <small>(somente números)</small></label>
                                                                <input id="ipi" oninput="validaInput(this)" class="ipi" type="number" step="0.1" min="0" value="0.00">
                                                            </div>
                                                            <div class="input input-icms">
                                                                <label>Valor R$ <strong>ICMS</strong> <small>(somente números)</small></label>
                                                                <input id="icms" oninput="validaInput(this)" class="icms" type="number" step="0.1" min="0" value="0.00">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="exit-add" data-dismiss="modal" class="cancel btn-modal">
                                                        Cancelar
                                                        <img src="../public/img/block-icon.svg" alt="Cancelar">
                                                    </button>
                                                    <button type="button" class="confirm-add" id="btn-add-item-modal" data-dismiss="modal" class="confirm btn-modal">
                                                        Adicionar
                                                        <img src="../public/img/check-icon.svg" alt="Confirmar">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim modal  -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="buy-attributes">
                        <div class="value-cart">
                            <span id="total-value">Valor total R$</span>
                            <span id="value-cart">0,00</span>
                        </div>
                        <div class="buttons">
                            <button type="button" id="cancelar-compra" class="cancel">
                                <span>Limpar Lista</span>
                                <img src="../public/img/block-icon.svg" alt="Limpar Lista">
                            </button>
                            <button type="submit" id="finalizar-compra" class="accept">
                                <span>Registrar Compra</span>
                                <img src="../public/img/check-icon.svg" alt="Finalizar compra">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>
<script>

    var produtos = [];

    <?php
    foreach ($lista_produtos as $produto) { ?>
        produtos["<?= $produto->id_produto ?>"] = {
            id: parseInt("<?= $produto->id_produto ?>"),
            nome: "<?= $produto->nome_produto ?>"
        }; <?php
    } ?>

    var buttonAddItem = document.getElementById("btn-add-item");
    var buttonAddItemModal = document.getElementById("btn-add-item-modal");
    var tableBodyItems = document.getElementById("table-body-items-compra");

    var inputNomeProduto = document.getElementById("nome-produto");
    var inputQuantProduto = document.getElementById("quantidade-item");
    var inputIcms = document.getElementById("icms");
    var inputIpi = document.getElementById("ipi");
    var inputFrete = document.getElementById("frete");
    var inputPrecoUni = document.getElementById("valor-unit");


    buttonAddItem.addEventListener("click", () => {
        inputNomeProduto.value = "";
        inputQuantProduto.value = 1;
        inputFrete.value = "0.00";
        inputIcms.value = "0.00";
        inputPrecoUni.value = "0.00";
        inputIpi.value = "0.00";
    });

    buttonAddItemModal.addEventListener("click", () => {

        if (inputNomeProduto.value != "" && inputQuantProduto.value != "") {

            tableBodyItems.innerHTML += `
                <tr>
                    <td>1</td>
                    <td>
                        <input type="text" name="id-produto[]" value="${inputNomeProduto.value}" required style="display: none">
                        ${produtos[inputNomeProduto.value].nome}
                    </td>
                    <td>
                        <input type="text" name="ipi[]" value="${inputIpi.value}" required style="display: none">
                        R$ ${parseFloat(inputIpi.value).toFixed(2)}
                    </td>
                    <td>
                        <input type="text" name="icms[]" value="${inputIcms.value}" required style="display: none">
                        R$ ${parseFloat(inputIcms.value).toFixed(2)}
                    </td>
                    <td>
                        <input type="text" name="frete[]" value="${inputFrete.value}" required style="display: none">
                        R$ ${parseFloat(inputFrete.value).toFixed(2)}
                    </td>
                    <td>
                        <input type="text" id="quantidade-produto" name="quantidade-produto[]" value="${inputQuantProduto.value}" required style="display: none">
                        ${inputQuantProduto.value} unid
                    </td>
                    <td>
                        <input type="text" name="valor-unitario[]" value="${inputPrecoUni.value}" required style="display: none">
                        R$ ${parseFloat(inputPrecoUni.value).toFixed(2)}
                    </td>
                    <td>
                        R$ ${parseFloat(inputPrecoUni.value*inputQuantProduto.value).toFixed(2)}
                    </td>
                    <td>
                        <button title="Remover item" onclick="removeRow(this)">
                            <img src="../public/img/lixeira-btn.svg" alt="Remover Produto">
                        </button>
                    </td>
                </tr>
            `;
        }
    });


    function removeRow(btn) {
        var row = btn.parentNode.parentNode;
        row.remove(row);
        //countTableRows();
        //setTotalValue();
    }

    //////////////////////////////////////////////////
    //             modal para fornecedor

    var fornecedor = [];

    <?php
    foreach ($lista_fornecedor as $fornecedor) { ?>
        fornecedor["<?= $fornecedor->id_fornecedor ?>"] = {
            id: parseInt("<?= $fornecedor->id_fornecedor ?>"),
            nome: "<?= $fornecedor->nome_fornecedor ?>"
        }; <?php
    } ?>

    var spanTxtSC = document.getElementById("name-fornecedor");
    var selectFornecedor = document.getElementById("nome-fornecedor");

    selectFornecedor.addEventListener("change", () => {
        spanTxtSC.value = fornecedor[parseInt(selectFornecedor.value)].nome.toUpperCase();
    });
    
    //////////////////////////////////////////////////
    //           modal metodo de pagamento

    var metPag = [];
    metPag[1] = {
        id: 1,
        tipo: "à vista"
    }

    <?php
    foreach ($lista_formaDePagamento as $pagamento) { ?>
        metPag["<?= $pagamento->id_forma_pagamento ?>"] = {
            id: parseInt("<?= $pagamento->id_forma_pagamento ?>"),
            tipo: "<?= $pagamento->tipo_pagamento ?>"
        }; <?php
    } ?>

    var spanTxtMP = document.getElementById("met-pag");
    var metodoPagamento = document.getElementById("metodo-pagamento");

    metodoPagamento.addEventListener("change", () => {
        spanTxtMP.value = metPag[parseInt(metodoPagamento.value)].tipo.toUpperCase();
    });

</script>

</html>