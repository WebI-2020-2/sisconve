<div class="modal fade" id="cadastrar-fornecedor-modal" tabindex="-1" aria-labelledby="cadastrar-fornecedor-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar fornecedor</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/FornecedorController/cadastrar" method="POST">
                <div class="">
                    <div class="input input-nome-fornecedor">
                        <label for="nome">Nome da fornecedor</label>
                        <input type="text" id="nome" name="nome-fornecedor" placeholder="nome do fornecedor" required>
                    </div>
                    <div class="input input-telefone-fornecedor">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone-fornecedor" required>
                    </div>
                    <div class="input input-nome-fornecedor">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade-fornecedor" required>
                    </div>
                    <div class="input input-estado-fornecedor">
                        <label for="estado-fornecedor">Estado</label>
                        <input type="text" name="estado-fornecedor" required>
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