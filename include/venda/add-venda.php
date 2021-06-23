
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
                Realizar uma venda
            </span>
        </div>
    </div>

    <form action="index.php" method="post" class="sell">
        <div class="sell-area">
            <div class="section section-sell-area p-0 m-0">
                <div class="title-section">
                    <h3>Lista de Produtos</h3>
                </div>
                <div class="table-section">
                    
                    <table class="table-scroll m-0">
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
                        <tbody>
                            <tr>
                                <td>0001</td>
                                <td>Caneca Porcelana Branca 500ml Porcelux</td>
                                <td>R$ 24,99</td>
                                <td>5 unidades</td>
                                <td>124,95</td>
                                <td>
                                    <a href=""><img src="../public/img/lixeira-btn.svg" alt=""></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0002</td>
                                <td>Vaso de Barro marrom Ceramica do Valdir</td>
                                <td>R$ 30,99</td>
                                <td>4 unidades</td>
                                <td>124,95</td>
                                <td>
                                    <a href="#"><img src="../public/img/lixeira-btn.svg" alt=""></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0002</td>
                                <td>Vaso de Barro marrom Ceramica do Valdir</td>
                                <td>R$ 30,99</td>
                                <td>4 unidades</td>
                                <td>124,95</td>
                                <td>
                                    <a href="#"><img src="../public/img/lixeira-btn.svg" alt=""></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="sell-info">
                    <div class="client">
                        <a href="#">
                            <img src="../public/img/Selecionar-Cliente.svg" alt="Cliente">
                            Selecionar Cliente
                        </a>
                        <div class="data-sell-info">
                            <input type="text" id="name-client" value="CLIENTE PADRÃO" disabled>
                        </div>
                    </div>
                    <div class="payment">
                        <a href="#" data-toggle="modal" data-target="#payment-modal">
                            <img src="../public/img/Meio-Pagamento.svg" alt="Metodo de Pagamento">
                            Meio de Pagamento
                        </a>
                        <div class="data-sell-info">
                            <input type="text" id="met-pag" value="À VISTA" disabled>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header float-right">
                                        <h5>Método de Pagamento</h5>
                                        <div class="text-right">
                                            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="check-btn">
                                            <input class="form-check-input" type="radio" value="0" name="flexRadioDefault" id="a-vista" checked>
                                            <label class="form-check-label" for="a-vista">À VISTA</label>
                                        </div>
                                        <div class="check-btn">
                                            <input class="form-check-input" type="radio" value="1" name="flexRadioDefault" id="a-prazo">
                                            <label class="form-check-label" for="a-vista">À PRAZO</label>
                                        </div>
                                        <div class="check-btn">
                                            <input class="form-check-input" type="radio" value="2" name="flexRadioDefault" id="card-deb">
                                            <label class="form-check-label" for="a-vista">CARTÃO DÉBITO</label>
                                        </div>
                                        <div class="check-btn">
                                            <input class="form-check-input" type="radio" value="3" name="flexRadioDefault" id="card-cred">
                                            <label class="form-check-label" for="a-vista">CARTÃO CRÉDITO</label>
                                        </div>
                                        <div class="check-btn">
                                            <input class="form-check-input" type="radio" value="4" name="flexRadioDefault" id="carne">
                                            <label class="form-check-label" for="a-vista">CARNÊ</label>
                                        </div>
                                        
                                    </div>

                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-primary">Sair</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </div>
                    <div class="add-product">
                        <a href="#" data-toggle="modal" data-target="#add-item-modal">
                            <img src="../public/img/Adicionar-Item.svg" alt="Adicionar Item">
                            Adicionar Item
                        </a>

                        <?php include("../include/modal/add-item-modal.php") ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="sell-attributes">
            <div class="value-cart">
                <span id="total-value">Valor total R$</span>
                <span id="value-cart">99999,00</span>
            </div>
            <div class="buttons">
                <a class="cancel" href="#">
                    <span>Cancelar venda</span>
                    <img src="../public/img/block-icon.svg" alt="Cancelar venda">
                </a>
                <button type="submit" class="accept" href="#">
                    <span>Finalizar Venda</span>
                    <img src="../public/img/check-icon.svg" alt="Finalizar venda">
                </button>
            </div>
        </div>
    </form>
</div>