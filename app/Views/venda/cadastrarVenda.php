<?php

    // trazer a variavel $dados['clientes'] pra cá
    include_once './../app/Models/ClienteModel.php';
    $cliente = new ClienteModel();
    $lista_cliente = $cliente->selectAllToSell();

    // trazer a variavel $dados['produtos'] pra cá
    include_once './../app/Models/ProdutoModel.php';
    $produto = new ProdutoModel();
    $lista_produtos = $produto->selectAll();

    // trazer a variavel $dados['metodo_pagamento'] pra cá
    include_once './../app/Models/FormaPagamentoModel.php';
    $formaDePagamento = new FormaPagamentoModel();
    $lista_formaDePagamento = $formaDePagamento->selectAll();

    include_once './../app/Models/CaixaModel.php';
    $caixa = new CaixaModel();
    

?>

<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Realizar Venda</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/style/sell-products.css">
    <link rel="stylesheet" href="../public/style/modal/add-item.css">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>


<body onload="countTableRows()">

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">
        <?= Sessao::mensagem('venda'); ?>

        <!-- inicio menu-bar (barra lateral)-->
        <?php include("./../app/include/parts/menubar.php") ?>

        <!-- box-center início (area central) -->
        <div class="content-center">

            <div class="dashboard sell-products">
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
                            <img src="../public/img/car-compra.svg" alt="Realizar venda">
                            Venda
                        </span>
                        <span>/</span>
                        <span>Realizar Venda</span>
                    </div>
                    <div class="caixa-id">
                        <span>Caixa ativo: <strong><?= $caixaCliente = $caixa->caixaFuncionario();?></strong></span>
                    </div>
                </div>

                <form action="<?= URL ?>/VendaController/cadastrar" method="POST" class="sell" onsubmit="setFormSubmitting()">
                    <div class="sell-area">
                        <div class="section section-sell-area p-0 m-0">
                            <div class="title-section">
                                <h3>Lista de Produtos</h3>
                            </div>
                            <div class="table-section">
                                <table class="table-scroll m-0" id="table-items-venda">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Produto</th>
                                            <th>Valor de Venda</th>
                                            <th>Quantidade</th>
                                            <th>Valor Total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-items-venda"></tbody>
                                </table>
                            </div>
                            <div class="sell-info">
                                <div class="client">
                                    <button type="button" id="btn" data-toggle="modal" data-target="#client-modal">
                                        <img src="../public/img/Selecionar-Cliente.svg" alt="Cliente">
                                        Cliente
                                    </button>
                                    <div class="data-sell-info">
                                        <input type="text" id="name-client" value="CLIENTE PADRÃO" disabled>
                                    </div>

                                    <!-- modal para selecionar o cliente -->
                                    <div class="modal fade" id="client-modal" tabindex="-1" aria-labelledby="client-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header float-right">
                                                    <h5>Cliente</h5>
                                                    <div class="close-modal">
                                                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                                                    </div>
                                                </div>

                                                <div class="modal-select">
                                                    <label for="cliente">Selecione um cliente</label>
                                                    <select name="cliente" id="nome-cliente">
                                                        <option value="1" selected>CLIENTE PADRÃO</option>
                                                        <?php foreach ($lista_cliente as $cliente) : ?>
                                                            <option value="<?= $cliente->id_cliente ?>"><?= $cliente->nome_cliente ?></option>
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

                                </div>
                                <div class="payment">
                                    <button type="button" id="btn" onclick="metPagamento()" data-toggle="modal" data-target="#payment-modal">
                                        <img src="../public/img/Meio-Pagamento.svg" alt="Metodo de Pagamento">
                                        Pagamento
                                    </button>
                                    <div class="data-sell-info">
                                        <input type="text" id="met-pag" value="À VISTA" disabled required>
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
                                                        <select name="metodo-pagamento" id="metodo-pagamento" onchange="metPagamento()" required>
                                                            <option value="1" selected>À VISTA</option>
                                                            <?php foreach ($lista_formaDePagamento as $formaDePagamentos) : ?>
                                                                <option value="<?= $formaDePagamentos->id_forma_pagamento ?>"><?= $formaDePagamentos->tipo_pagamento ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="input-parcel">
                                                        <label for="num-parcelas">Número de parcelas</label>
                                                        <input type="text" id="input-parcela" name="num-parcelas" min="1" max="99" oninput="validaInputNumber(this)" maxlength="2" value="1" required>
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

                                </div>
                                <div class="add-product">
                                    <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                                        <img src="../public/img/adicionar-item.svg" alt="Adicionar Item">
                                        Adicionar Item
                                    </button>

                                    <!-- modal add-items -->
                                    <div class="modal fade" id="add-item-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-add-items-sell modal-dialog-centered">
                                            <div class="modal-content modal-content-add-items">
                                                <div class="modal-header float-right">
                                                    <h5>Adicionar um item a venda</h5>
                                                    <div class="close-modal">
                                                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                                                    </div>
                                                </div>
                                                <div class="modal-select">
                                                    <div class="input-modal-add-item">
                                                        <div class="input-product">
                                                            <label>Nome do produto</label>
                                                            <select id="nome-produto" class="select name-product" required>
                                                                <option value="" disabled selected>Selecione um produto</option>
                                                                <?php foreach ($lista_produtos as $produtos) : ?>
                                                                    <option value="<?= $produtos->id_produto ?>"><?= Validar::upperCase($produtos->nome_produto) ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-quantidade">
                                                            <label>Quantidade</label>
                                                            <input id="quantidade-item" oninput="validaInputNumber(this)" class="quant-product" type="text" min="1" value="1" required>
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
                    <div class="sell-attributes">
                        <div class="value-cart">
                            <span id="total-value">Valor total R$</span>
                            <span id="value-cart">0.00</span>
                        </div>
                        <div class="buttons">
                            <button type="button" id="cancelar-venda" class="cancel">
                                <span>Cancelar Venda</span>
                                <img src="../public/img/block-icon.svg" alt="Cancelar venda">
                            </button>
                            <button type="submit" id="finalizar-venda" class="accept">
                                <span>Finalizar Venda</span>
                                <img src="../public/img/check-icon.svg" alt="Finalizar venda">
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- box-center fim -->

    </div>

</body>

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php"); ?>
<script src="../public/js/checkReload.js"></script>
<script src="../public/js/metPagamento.js"></script>
<script>
    var produtos = [];
    var estoqueProduto = [];

    <?php
    foreach ($lista_produtos as $produto) { ?>
        produtos["<?= $produto->id_produto ?>"] = {
            id: parseInt("<?= $produto->id_produto ?>"),
            nome: "<?= $produto->nome_produto ?>",
            valor: parseFloat("<?= $produto->preco_venda ?>"),
            quantidade: parseInt("<?= $produto->quantidade ?>")
        };
        estoqueProduto["<?= $produto->id_produto ?>"] = parseInt("<?= $produto->quantidade ?>"); <?php
    } ?>

    var buttonAddItem = document.getElementById("btn-add-item");
    var inputNomeProduto = document.getElementById("nome-produto");
    var inputQuantProduto = document.getElementById("quantidade-item");
    var tableBodyItems = document.getElementById("table-body-items-venda");
    var buttonAddItemModal = document.getElementById("btn-add-item-modal");
    var cancelarVenda = document.getElementById("cancelar-venda");
    var finalizarVenda = document.getElementById("finalizar-venda");
    var valorTotalVenda = document.getElementById("value-cart");
    var table = document.getElementById("table-items-venda");
    var indiceTable = 0;

    buttonAddItem.addEventListener("click", () => {
        inputNomeProduto.value = "";
        inputQuantProduto.value = 1;
    });

    buttonAddItemModal.addEventListener("click", () => {

        if (inputQuantProduto.value > estoqueProduto[inputNomeProduto.value]) {
            return alert("Não existe essa quantidade para esse produto cadastrado em estoque!");
        }

        if (inputNomeProduto.value != "" && inputQuantProduto.value != "") {

            estoqueProduto[inputNomeProduto.value] -= inputQuantProduto.value;

            tableBodyItems.innerHTML += `
                <tr>
                    <td>${indiceTable+1}</td>
                    <td>
                        <input type="text" name="id-produto[]" value="${inputNomeProduto.value}" required style="display: none">
                        ${produtos[inputNomeProduto.value].nome}
                    </td>
                    <td>
                        <input type="text" name="valor-unitario[]" value="${(produtos[inputNomeProduto.value].valor).toFixed(2)}" required style="display: none">
                        R$ ${(produtos[inputNomeProduto.value].valor).toFixed(2)}
                    </td>
                    <td>
                        <input type="text" id="quantidade-produto" name="quantidade-produto[]" value="${inputQuantProduto.value}" required style="display: none">
                        ${inputQuantProduto.value} unid
                    </td>
                    <td>
                        <input type="text" id="valor-total-produto" value="${(parseInt(inputQuantProduto.value)*produtos[inputNomeProduto.value].valor)}" required style="display: none">
                        R$ ${(parseInt(inputQuantProduto.value)*produtos[inputNomeProduto.value].valor).toFixed(2)}
                    </td>
                    <td>
                        <button title="Remover item" onclick="removeRow(this)">
                            <img src="../public/img/lixeira-btn.svg" alt="Remover Produto">
                        </button>
                    </td>
                </tr>
            `;
        }

        indiceTable++;
        countTableRows();
        setTotalValue();
    });

    function setTotalValue() {
        var valores = document.querySelectorAll("#valor-total-produto");
        var valorTotal = 0;
        valores.forEach((valor) => {
            valorTotal += parseFloat(valor.value);
        });

        valorTotalVenda.innerHTML = valorTotal.toFixed(2);
    }

    function removeRow(btn) {
        var row = btn.parentNode.parentNode;
        row.remove(row);
        countTableRows();
        setTotalValue();
    }

    function countTableRows() {
        if (table.rows.length == 1) {
            finalizarVenda.disabled = true;
            cancelarVenda.disabled = true;
            finalizarVenda.style.cursor = "not-allowed";
            cancelarVenda.style.cursor = "not-allowed";
            finalizarVenda.style.opacity = "70%";
            cancelarVenda.style.opacity = "70%";
        } else {
            finalizarVenda.disabled = false;
            cancelarVenda.disabled = false;
            finalizarVenda.style.cursor = "pointer";
            cancelarVenda.style.cursor = "pointer";
            finalizarVenda.style.opacity = "100%";
            cancelarVenda.style.opacity = "100%";
        }
    }

    cancelarVenda.addEventListener("click", () => {
        var value = confirm("Deseja cancelar a venda?");
        if (value) {
            tableBodyItems.innerHTML = "";
            // devolvendo a quantidade dos produtos para a variavel estoque
            produtos.forEach(produto => {
                estoqueProduto[produto.id] = produto.quantidade;
            });
        }
        indiceTable = 0;
        countTableRows();
        setTotalValue();
    });

    //////////////////////////////////////////////////
    //                 modal clientes

    var clientes = [];
    clientes[1] = {
        id: 1,
        nome: "Cliente Padrão"
    }

    <?php
    foreach ($lista_cliente as $cliente) { ?>
        clientes["<?= $cliente->id_cliente ?>"] = {
            id: parseInt("<?= $cliente->id_cliente ?>"),
            nome: "<?= $cliente->nome_cliente ?>"
        }; <?php
    } ?>

    var spanTxtSC = document.getElementById("name-client");
    var selectCliente = document.getElementById("nome-cliente");

    selectCliente.addEventListener("change", () => {
        spanTxtSC.value = clientes[parseInt(selectCliente.value)].nome.toUpperCase();
    });

    //////////////////////////////////////////////////
    //           modal metodo de pagamento

    var metPag = [];
    metPag[1] = {
        id: 1,
        tipo: "à vista"
    }

    <?php
    foreach ($lista_formaDePagamento as $formaDePagamento) { ?>
        metPag["<?= $formaDePagamento->id_forma_pagamento ?>"] = {
            id: parseInt("<?= $formaDePagamento->id_forma_pagamento ?>"),
            tipo: "<?= $formaDePagamento->tipo_pagamento ?>"
        };
    <?php
    }
    ?>

    var spanTxtMP = document.getElementById("met-pag");
    var metodoPagamento = document.getElementById("metodo-pagamento");

    metodoPagamento.addEventListener("change", () => {
        spanTxtMP.value = metPag[parseInt(metodoPagamento.value)].tipo.toUpperCase();
    });
</script>

</html>