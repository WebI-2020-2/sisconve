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
                <img src="../public/img/people-icon.svg" alt="Clientes">
                Clientes
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por um cliente">
                <img src="../public/img/search-icon.svg" alt="">
            </div>

            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal">
                <img src="../public/img/adicionar-item.svg" alt="Adicionar cliente">
                Cadastrar Cliente
            </button>

            <?php 
                // modal para cadastro do produto
                include('../include/modal/cadastrar-cliente-modal.php');
            ?>

        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Cliente</th>
                        <th>Contato</th>
                        <th>CPF</th>
                        <th>Crédito</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Maria Devedora da Silva</td>
                        <td>9988556633</td>
                        <td>123.456.789-10</td>
                        <td>R$ 00,00</td>
                        <td>
                            <a title="Ver cliente" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar cliente" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Excluir cliente" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>