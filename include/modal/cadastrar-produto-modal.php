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

            <form action="./testepost.php" method="POST">
                <div class="d-flex justify-content-center">
                    <div class="input-nome-produto">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome-produto" placeholder="nome do produto" required>
                    </div>
                    <div class="input-catagoria">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" required>
                            <option value="" disabled selected>Selecione uma categoria</option>
                            <option value="0">Brinquedos</option>
                            <option value="1">Utensilios</option>
                            <option value="2">Ferramentas</option>
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