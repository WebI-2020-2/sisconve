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
                                        <img src="../public/img/Adicionar-Item.svg" alt="Adicionar Item">
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
                            <span id="value-cart">00,00</span>
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
<script src="../public/js/realizarVenda.js"></script>

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