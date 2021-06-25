<div class="dashboard">
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
                <img src="../public/img/product-dark.svg" alt="Produto">
                Produtos
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por um produto">
                <img src="../public/img/search-icon.svg" alt="">
            </div>

            <button id="btn" data-toggle="modal" data-target="#cadastrar-produto-modal">
                <img src="../public/img/adicionar-item.svg" alt="Adicionar produto">
                Cadastrar Produto
            </button>

            <?php 
                include('../include/modal/cadastrar-produto.php');
            ?>

        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Produto</th>
                        <th>Categoria</th>
                        <th>Preço de Venda</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Caneca Porcelana Branca 500ml Porcelux</td>
                        <td>Porcelana</td>
                        <td>R$ 15,00</td>
                        <td>45 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                    <tr id="item-details">
                        <td>0002</td>
                        <td>Cadeira de vidro</td>
                        <td>Porcelana</td>
                        <td>R$ 25,00</td>
                        <td>78 unid</td>
                        <td>
                            <a title="Ver produto" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar produto" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir produto" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>