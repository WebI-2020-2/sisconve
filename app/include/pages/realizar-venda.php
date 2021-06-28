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

    <form action="./teste.php" method="POST" class="sell">
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
                        <?php 
                            // modal para o metodo de pagamento
                            include('../include/modal/cliente-modal.php');
                        ?>
                    </div>
                    <div class="payment">
                        <a href="#" data-toggle="modal" data-target="#payment-modal">
                            <img src="../public/img/Meio-Pagamento.svg" alt="Metodo de Pagamento">
                            Pagamento
                        </a>
                        <div class="data-sell-info">
                            <input type="text" id="met-pag" value="À VISTA" disabled required>
                        </div>
                        <?php 
                            // modal para o metodo de pagamento
                            include('../include/modal/metodo-pagamento-modal.php');
                        ?>
                    </div>
                    <div class="add-product">
                        <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                            <img src="../public/img/Adicionar-Item.svg" alt="Adicionar Item">
                            Adicionar Item
                        </button>
                        <?php 
                            // chamada do modal add-items
                            include("../include/modal/add-item-modal.php");
                        ?>
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