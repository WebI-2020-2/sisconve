<div class="dashboard">
    <div class="title-content">
        <div class="title-text">
            <span>
                <a href="<?= URL?>/DashboardController/dashboard">
                    <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                    Dashboard
                </a>
            </span>
            <span>/</span>
            <span>
                <img src="../public/img/car-compra.svg" alt="Vendas">
                Vendas
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por uma venda">
                <img src="../public/img/search-icon.svg" alt="Search">
            </div>
        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Valor total</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Maria Antonieta</td>
                        <td>R$ 250,00</td>
                        <td>25/25/2525</td>
                        <td>
                            <a title="Ver venda" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar venda" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir venda" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>