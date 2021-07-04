<?php
include_once './../app/Models/CategoriaModel.php';
$categoria = new CategoriaModel();
$lista_categorias = $categoria->selectAll();
?>
<div class="modal fade" id="cadastrar-produto-modal" tabindex="-1" aria-labelledby="cadastrar-produto-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar produto</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/ProdutosController/cadastrarProduto" method="POST">
                <div class="d-flex justify-content-center">
                    <div class="input-nome-produto">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome_produto" id="nome_produto" placeholder="nome do produto" required>
                    </div>
                    <div class="input-catagoria">
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>