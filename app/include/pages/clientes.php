<div class="dashboard">
    <div class="title-content">
        <div class="title-text">
            <span>
                <a href="./dashboard.php">
                    <img src="<?= URL?>/public/img/dashboard-verde.svg" alt="Dashboard">
                    Dashboard
                </a>
            </span>
            <span>/</span>
            <span>
                <img src="<?= URL?>/public/img/people-icon.svg" alt="Clientes">
                Clientes
            </span>
        </div>
    </div>

    <div class="item-area">
        <div class="manage-item-top">
            <div class="search-item">
                <input id="search" type="text" placeholder="Procure por um cliente">
                <img src="<?= URL?>/public/img/search-icon.svg" alt="">
            </div>

            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal">
                <img src="<?= URL?>/public/img/adicionar-item.svg" alt="Adicionar cliente">
                Cadastrar Cliente
            </button>

            <?php 
                // modal para cadastro do produto
                include('./../app/include/modal/cadastrar-cliente-modal.php');
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
                        <th>Débito</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($dados['clientes'] as $cliente): ?>
                            <td><?= $cliente->id_cliente ?></td>
                            <td><?= $cliente->nome_cliente ?></td>
                            <td>Há preencher</td>
                            <td><?= $cliente->cpf ?></td>
                            <td><?= $cliente->credito ?></td>
                            <td><?= $cliente->debito ?></td>
                            <td>
                                <a title="Ver cliente" href="#">
                                    <img src="<?= URL ?>/public/img/eye-icon.svg" alt="">
                                </a>
                                <a title="Editar cliente" href="#">
                                    <img src="<?= URL ?>/public/img/pencil-icon.svg" alt="">
                                </a>
                                <a title="Exluir cliente" href="#">
                                    <img src="<?= URL ?>/public/img/trash-icon.svg" alt="">
                                </a>
                            </td> <?php 
                        endforeach 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>