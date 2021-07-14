<?php
include_once './../app/Models/CategoriaModel.php';
$categoria = new CategoriaModel();
$lista_categorias = $categoria->selectAll();
?>
<div class="modal fade" id="editar-produto-modal" tabindex="-1" aria-labelledby="editar-produto-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cad-produto modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Atualizar produto</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/ProdutosController/update" method="POST">
                <div class="form">
                    <div class="input input-nome-produto">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome_produto" oninput="validaInput(this)" id="nome-produto" placeholder="Boneco Max Steel" required>
                    </div>
                    <div class="input input-categoria">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" required>
                            <option value="" disabled selected>Selecione uma categoria</option>
                            <?php foreach($lista_categorias as $categorias) : ?>
                                <option value="<?= $categorias->id_categoria ?>">
                                    <?= $categorias->nome_categoria  ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- levando o id do produto via POST -->
                <input name="id_produto" id="id-produto" style="display: none;" required>

                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">
                        Cancelar
                        <img src="../public/img/block-icon.svg" alt="Cancelar">
                    </button>
                    <button type="submit" class="submit">
                        Atualizar
                        <img src="../public/img/check-icon.svg" alt="Atualizar">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>