<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= URL ?>/public/img/favicon.svg" type="image/x-icon">
    <title>SISCONVE - Dashboard</title>
    <!-- estilos -->
    <?php include("./../app/include/etc/styles.php"); ?>
</head>

<body>

    <!-- navbar topo -->
    <?php include("./../app/include/parts/navbar.php"); ?>

    <div id="container">

        <!-- menu lateral -->
        <?php include("./../app/include/parts/menubar.php"); ?>

        <div class="content-center">

            <!-- conteudo do centro -->
            <div class="dashboard">
                <div class="title-content">
                    <div class="title-text">
                        <span>
                            <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                            Dashboard
                        </span>
                        <span>/</span>
                    </div>
                </div>
                <div class="main-page">
                    <div class="dash-btns">
                        <a href="<?= URL ?>/ClientesController/listarClientes" style="background-color: #31736F;" class="button">
                            <span><img src="../public/img/clientes-btn.svg" alt="">Clientes</span>
                        </a>
                        <a href="<?= URL ?>/ProdutosController/listarProdutos" style="background-color: #A50000;" class="button">
                            <span><img src="../public/img/produtos-btn.svg" alt="">Produtos</span>
                        </a>
                        <a href="<?= URL ?>/CategoriaController/listarCategoria" style="background-color: #A1A500;" class="button">
                            <span><img src="../public/img/categorias-btn.svg" alt="">Categorias</span>
                        </a>
                        <a href="<?= URL ?>/VendaController/cadastrar" style="background-color: #890765;" class="button">
                            <span><img src="../public/img/vendas-btn.svg" alt="">Vendas</span>
                        </a>
                        <a href="<?= URL ?>/CompraController/listarCompras" style="background-color: #00FF66;" class="button">
                            <span><img src="../public/img/compas-btn.svg" alt="">Compras</span>
                        </a>
                        <a href="<?= URL ?>/FornecedorController/listarFornecedor" style="background-color: #00A3FF;" class="button">
                            <span><img src="../public/img/fornecedor-btn.svg" alt="">Fornecedor</span>
                        </a>
                        <a href="#" style="background-color: #FF0099;" class="button">
                            <span><img src="../public/img/relatorio-btn.svg" alt="">Relatorios</span>
                        </a>
                        <a href="#" style="background-color: #47948F;" class="button">
                            <span><img src="../public/img/financas-btn.svg" alt="">Finanças</span>
                        </a>
                    </div>

                    <div class="content-dashboard">
                        <div class="content">
                            <div class="section">
                                <div class="section-title">
                                    <span><img src="../public/img/chart-icon.svg" alt="">Números</span>
                                </div>
                                <div class="section-card">
                                    <div class="card" style="background-color: #00A3FF !important;">
                                        <div class="title-card" style="background-color: #0095E9 !important;">
                                            <span>Média de Venda / dia</span>
                                        </div>
                                        <div class="card-body">
                                            <strong>9999</strong>
                                            <span>vendas</span>
                                        </div>
                                    </div>
                                    <div class="card" style="background-color: #00A507 !important;">
                                        <div class="title-card" style="background-color: #1C9821 !important;">
                                            <span>Média de Lucro / dia</span>
                                        </div>
                                        <div class="card-body">
                                            <span>R$</span>
                                            <strong>9999,99</strong>

                                        </div>
                                    </div>
                                    <div class="card" style="background-color: #11858C !important;">
                                        <div class="title-card" style="background-color: #25767B !important;">
                                            <span>Total de Clientes</span>
                                        </div>
                                        <div class="card-body">
                                            <strong>9999</strong>
                                            <span>clientes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Produtos que tem baixa no estoque... -->
                            <div class="section">
                                <div class="section-title">
                                    <span><img src="../public/img/probaixoestoque-btn.svg" alt="">Produtos com baixa no Estoque</span>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Produto</th>
                                            <th>Valor Unitario</th>
                                            <th>Quantidade</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0001</td>
                                            <td>Caneca Porcelana Branca 500ml Porcelux</td>
                                            <td>R$ 24,99</td>
                                            <td>5 unidades</td>
                                            <td>
                                                <a href=""><img src="../public/img/edit-tabela.svg" alt=""></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>0002</td>
                                            <td>Vaso de Barro marrom Ceramica do Valdir</td>
                                            <td>R$ 30,99</td>
                                            <td>4 unidades</td>
                                            <td>
                                                <a href="#"><img src="../public/img/edit-tabela.svg" alt=""></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- clientes que devem... -->
                            <div class="section">
                                <div class="section-title">
                                    <span><img src="../public/img/cliParcleasVencendo.svg" alt="">Clientes com parcelas vencendo</span>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome do Cliente</th>
                                            <th scope="col">Valor da Parcela</th>
                                            <th scope="col">Vencimento</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0001</td>
                                            <td>Maria Devedora da Silva</th>
                                            <td>R$ 24,99</td>
                                            <td>25/02/2021</td>
                                            <td>
                                                <a href=""><img src="../public/img/ver-table.svg" alt=""></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>0002</td>
                                            <td>José Bonifácil de Nogueira</td>
                                            <td>R$ 30,99</td>
                                            <td>32/13/1999</td>
                                            <td>
                                                <a href=""><img src="../public/img/ver-table.svg" alt=""></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

<!-- scripts -->
<?php include("./../app/include/etc/scripts.php"); ?>

</html>