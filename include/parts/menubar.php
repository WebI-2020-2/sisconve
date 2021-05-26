<div class="wrapper d-flex left-bar">
    <div class="sidebar">
        <ul class="menu-items">
            <li href="#" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/dashboard.svg" alt="">Dashboard</span>
            </li>
            <li href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/clientes.svg" alt="">Clientes</span>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Ver clientes</a></li>
                    <li><a href="#">Cadastrar um cliente</a></li>
                    <li><a href="#">Atualizar cliente</a></li>
                    <li><a href="#">Excluir cliente</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuProdutos" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/produtos.svg" alt="">Produtos</span>
                <ul class="collapse list-unstyled" id="pageSubmenuProdutos">
                    <li><a href="#">Cadastrar um produto</a></li>
                    <li><a href="">Ver produtos</a></li>
                    <li><a href="#">Atualizar produto</a></li>
                    <li><a href="#">Excluir produto</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuCategorias" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/categorias.svg" alt="">Categorias</span>
                <ul class="collapse list-unstyled" id="pageSubmenuCategorias">
                    <li><a href="#">Cadastrar um categoria</a></li>
                    <li><a href="">Ver Categorias</a></li>
                    <li><a href="#">Atualizar categoria</a></li>
                    <li><a href="#">Excluir categoria</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuVendas" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/vendas.svg" alt="">Vendas</span>
                <ul class="collapse list-unstyled" id="pageSubmenuVendas">
                    <li><a href="./realizar-venda.php">Realizar uma venda</a></li>
                    <li><a href="">Ver vendas</a></li>
                    <li><a href="#">Atualizar venda</a></li>
                    <li><a href="#">Excluir venda</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuCompras" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/Compras.svg" alt="">Compras</span>
                <ul class="collapse list-unstyled" id="pageSubmenuCompras">
                    <li><a href="#">Registrar uma compras</a></li>
                    <li><a href="">Ver compras</a></li>
                    <li><a href="#">Atualizar compras</a></li>
                    <li><a href="#">Excluir compras</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuFornecedor" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/Fornecedor.svg" alt="">Fornecedor</span>
                <ul class="collapse list-unstyled" id="pageSubmenuFornecedor">
                    <li><a href="#">Cadastrar um fornecedor</a></li>
                    <li><a href="">Ver fornecedor</a></li>
                    <li><a href="#">Atualizar fornecedor</a></li>
                    <li><a href="#">Excluir fornecedor</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuFornecedoa" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/financas.svg" alt="">Finanças</span>
                <ul class="collapse list-unstyled" id="pageSubmenuFornecedoa">
                    <li><a href="">Ver realatorios</a></li>
                </ul>
            </li>

            <li href="#pageSubmenuRelatório" data-toggle="collapse" aria-expanded="false" class="dropdown">
                <span><img src="../img/relatorios.svg" alt="">Relatório</span>
            </li>
        </ul>
        <ul class="footer-sidebar dropdown">
            <div class="text-center">
                <a href="#" id="log-off" data-toggle="modal" data-target="#logoff-modal">
                    <img src="../img/logout.svg" alt="">
                    Sair do sistema
                </a>
                <span id="clock"></span>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="logoff-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header float-right">
                            <h5>Sair do sistema</h5>
                            <div class="text-right">
                                <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                            </div>
                        </div>

                        <div>
                            <h1 class="text-center">Deseja sair do sistema?</h1>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Sair</button>
                        </div>
                    </div>
                </div>
            </div>

        </ul>
    </div>
</div>