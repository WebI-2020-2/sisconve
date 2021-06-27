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
                <img src="../public/img/categoria-dark.svg" alt="Categorias">
                Categorias
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por uma categoria">
                <img src="../public/img/search-icon.svg" alt="">
            </div>

            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-categoria-modal">
                <img src="../public/img/adicionar-item.svg" alt="Adicionar categoria">
                Adicionar Categoria
            </button>

            <?php 
                // modal para cadastro do categoria
                include('../include/modal/cadastrar-categoria-modal.php');
            ?>

        </div>

        <div class="table-item-area">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome da Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="item-details">
                        <td>0001</td>
                        <td>Utensilios</td>
                        <td>
                            <a title="Ver categoria" href="#">
                                <img src="../public/img/eye-icon.svg" alt="">
                            </a>
                            <a title="Editar categoria" href="#">
                                <img src="../public/img/pencil-icon.svg" alt="">
                            </a>
                            <a title="Exluir categoria" href="#">
                                <img src="../public/img/trash-icon.svg" alt="">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>