<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Realizar Venda</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body onload="countTableRows()">

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php") ?>

    <div id="container">

        <!-- inicio menu-bar (barra lateral)-->
        <?php include("./../app/include/parts/menubar.php") ?>

        <!-- box-center início (area central) -->
        <div class="content-center">

            <div class="dashboard sell-products">
                <div class="title-content">
                    <div class="title-text">
                        <span>
                            <a href="./dashboard.php">
                                <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                                Dashboard
                            </a>
                        </span>
                        <span>/</span>
                        <span>
                            <img src="../public/img/car-compra.svg" alt="Realizar venda">
                            Realizar venda
                        </span>
                    </div>
                </div>

                <form action="#" method="POST" class="sell">
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
                                    <a href="#" data-toggle="modal" data-target="#client-modal">
                                        <img src="../public/img/Selecionar-Cliente.svg" alt="Cliente">
                                        Cliente
                                    </a>
                                    <div class="data-sell-info">
                                        <input type="text" id="name-client" value="CLIENTE PADRÃO" disabled>
                                    </div>
                                    <!-- modal para o metodo de pagamento -->
                                    <?php include('./../app/include/modal/cliente-modal.php'); ?>
                                </div>
                                <div class="payment">
                                    <a href="#" data-toggle="modal" data-target="#payment-modal">
                                        <img src="../public/img/Meio-Pagamento.svg" alt="Metodo de Pagamento">
                                        Pagamento
                                    </a>
                                    <div class="data-sell-info">
                                        <input type="text" id="met-pag" value="À VISTA" disabled required>
                                    </div>
                                    <!-- modal para o metodo de pagamento -->
                                    <?php include('./../app/include/modal/metodo-pagamento-modal.php'); ?>
                                </div>
                                <div class="add-product">
                                    <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                                        <img src="../public/img/adicionar-item.svg" alt="Adicionar Item">
                                        Adicionar Item
                                    </button>
                                    <!-- chamada do modal add-items -->
                                    <?php include("./../app/include/modal/add-item-modal.php"); ?>
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
<script src="../public/js/metPagamento.js"></script>
<script src="../public/js/selectCliente.js"></script>

<script>

    var produtos = [];
    var estoqueProduto = [];
    
    <?php 
        include_once './../app/Models/ProdutoModel.php';
        $produto = new ProdutoModel();
        $lista_produtos = $produto->selectAll();

        // trazer a variavel $dados['produtos'] pra cá

        foreach($lista_produtos as $produto): ?>
            produtos["<?= $produto->id_produto ?>"] = {
                id : parseInt("<?= $produto->id_produto ?>"),
                nome : "<?= $produto->nome_produto ?>",
                valor : parseFloat("<?= $produto->preco_venda ?>"),
                quantidade : parseInt("<?= $produto->quantidade ?>")
            }; 
            estoqueProduto["<?= $produto->id_produto ?>"] = parseInt("<?= $produto->quantidade ?>");
            <?php
        endforeach;
    ?>

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
        //console.log(parseInt(row.querySelector("#quantidade-produto").value))
        estoqueProduto[row.querySelector("input").value] += parseInt(row.querySelector("#quantidade-produto").value);
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

</script>

</html>

<!-- <form name="cadastrar" action="<?= URL ?>/VendaController/cadastrar" method="post" class="text-center">
    <label for="">Quantidade</label>
    <input type="text" id="quantidade" name="quantidade">

    <br>

    <label for="">Valor</label>
    <input type="number" name="valor_unitario" id="valor_unitario">


    <br>

    <label for="">Numero de parcelas</label>
    <input type="number" name="num_parcelas" id="num_parcelas">

    <br>

    <input type="submit" class="btn btn-primary" value="Enviar">

</form> -->