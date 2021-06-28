<div class="wrapper d-flex left-bar">
    <div class="sidebar">
        <ul class="menu-items">
            <li href="#" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <a href="dashboard.php"><img src="../public/img/dashboard.svg" alt="">Dashboard</a>
            </li>
            <li href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <a href="<?= URL?>/ClientesController/listarClientes"><img src="../public/img/clientes.svg" alt="">Clientes</a>
            </li>

            <li href="#pageSubmenuProdutos" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <a href="./produtos.php"><img src="../public/img/produtos.svg" alt="">Produtos</a>
            </li>

            <li href="#pageSubmenuCategorias" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <a href="<?= URL?>/CategoriaController/listarCategoria"><img src="../public/img/categorias.svg" alt="">Categorias</a>
            </li>

            <li href="#pageSubmenuVendas" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../public/img/vendas.svg" alt="">Vendas</span>
                <ul class="collapse list-unstyled" id="pageSubmenuVendas">
                    <li><a href="./realizar-venda.php">Realizar venda</a></li>
                    <li><a href="#">Ver vendas</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuCompras" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../public/img/Compras.svg" alt="">Compras</span>
                <ul class="collapse list-unstyled" id="pageSubmenuCompras">
                    <li><a href="#">Registrar uma compra</a></li>
                    <li><a href="#">Ver compras</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuFornecedor" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../public/img/Fornecedor.svg" alt="">Fornecedor</span>
            </li>

            <li href="#pageSubmenuFornecedoa" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../public/img/financas.svg" alt="">Finanças</span>
                <ul class="collapse list-unstyled" id="pageSubmenuFornecedoa">
                    <li><a href="#">Ver relatorios</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuRelatório" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../public/img/relatorios.svg" alt="">Relatório</span>
            </li>
        </ul>
        <ul class="footer-sidebar dropdown">
            <div class="text-center">
                <a href="#" id="log-off" data-toggle="modal" data-target="#logoff-modal">
                    <img src="../public/img/logout.svg" alt="Logout">
                    Sair do sistema
                </a>
                <?php 
                    // chamando o modal de logoff
                    include('./../app/include/modal/logoff-modal.php'); 
                ?>
                <span id="clock"></span>
            </div>            
        </ul>
    </div>
</div>