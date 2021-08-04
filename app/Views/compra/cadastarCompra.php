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

                <form action="" class="buy">
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
                                    <tbody id="table-body-items-compra">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buy-info">
                                <div class="fornecedor">
                                <button type="button" id="btn" data-toggle="modal" data-target="#fornecedor-modal">
                                        <img src="../public/img/fornecedor.svg" alt="Fornecedor">
                                        Fornecedor
                                    </button>
                                    <div class="data-buy-info">
                                        <input type="text" value="TESTE" disabled>
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
                                                    <label for="fornecedore">Selecione um fornecedor</label>
                                                    <select name="fornecedore" id="nome-fornecedore">
                                                        <option value="1" selected>FORNECEDOR PADRÃO</option>
                                                       
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
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="buy-attributes">
                        <div class="value-cart">
                            <span id="total-value">Valor total R$</span>
                            <span id="value-cart">0.00</span>
                        </div>
                        <div class="buttons">
                            <button type="button" id="cancelar-compra" class="cancel">
                                <span>Cancelar Compra</span>
                                <img src="../public/img/block-icon.svg" alt="Cancelar compra">
                            </button>
                            <button type="submit" id="finalizar-compra" class="accept">
                                <span>Registrar Compra</span>
                                <img src="../public/img/check-icon.svg" alt="Finalizar compra">
                            </button>
                        </div>
                    </div>
                </form>
















                <?php
                    include './../app/Models/FuncionarioModel.php';
                    $fornecedor = new FornecedorModel();
                    $lista_fornecedor = $fornecedor->selectAll();

                    $funcionario = new FuncionarioModel();
                    $lista_funcionario = $funcionario->selectAll();

                    $produto = new ProdutoModel();
                    $lista_produtos = $produto->selectAll();
                ?>

                <!-- <form name="cadastrar" action="<?= URL ?>/CompraController/CompraComProduto" method="post" class="text-center">



                    <label for="">Funcionario</label>
                    <select name="funcionario" id="funcionario">
                        <?php foreach ($lista_funcionario as $funcionarios) : ?>
                            <option value="<?= $funcionarios->id_funcionario ?>"><?= $funcionarios->nome_funcionario ?></option>
                        <?php endforeach; ?>
                    </select>

                    <br>
                    <label for="">Parcelas</label>
                    <input type="text" name="parcelas" id="parcelas">

                    <br>


                    <label for="">Produto</label>
                    <select name="produto" id="produto">
                        <?php foreach ($lista_produtos as $produtos) : ?>
                            <option value="<?= $produtos->id_produto ?>"><?= $produtos->nome_produto ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>

                    <label for="">Ipi</label>
                    <input type="text" name="ipi" id="ipi">

                    <br>

                    <label for="">Frete</label>
                    <input type="text" name="frete" id="frete">

                    <br>

                    <label for="">Icms</label>
                    <input type="text" name="icms" id="icms">

                    <br>

                    <label for="">Quantidade</label>
                    <input type="text" name="quantidade" id="quantidade">

                    <br>

                    <label for="">Preco de compra</label>
                    <input type="text" name="preco_compra" id="preco_compra">

                    <br>
                    <input type="submit" value="Comprar" class="btn btn-primary">


                </form> -->

                
            </div>
        </div>
    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>

</html>
















