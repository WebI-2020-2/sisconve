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
                <img src="../public/img/truck-icon.svg" alt="Fornecedor">
                Fornecedores
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por um fornecedor">
                <img src="../public/img/search-icon.svg" alt="Search">
            </div>

            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-fornecedor-modal">
                <img src="../public/img/adicionar-item.svg" alt="Adicionar fornecedor">
                Cadastrar Fornecedor
            </button>

            <?php 
                // modal para cadastro do fornecedor
                include('../src/includes/modal/cadastrar-fornecedor-modal.php');
            ?>

        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Fornecedor</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Cotiplas</td>
                        <td>77 992256874</td>
                        <td>Candiba</td>
                        <td>BA</td>
                        <td>
                            <a title="Ver fornecedor" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar fornecedor" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir fornecedor" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>