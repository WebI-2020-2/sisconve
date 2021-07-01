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
                <img src="../public/img/car-comprad.svg" alt="Compras">
                Compras
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por uma compra">
                <img src="../public/img/search-icon.svg" alt="Search">
            </div>
        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Comprado por</th>
                        <th>Fornecedor</th>
                        <th>Valor total</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Zeca Zika</td>
                        <td>Nike</td>
                        <td>R$ 2566,00</td>
                        <td>25/25/2525</td>
                        <td>
                            <a title="Ver compra" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar compra" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir compra" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>