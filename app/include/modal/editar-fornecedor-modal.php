<div class="modal fade" id="editar-fornecedor-modal" tabindex="-1" aria-labelledby="editar-fornecedor-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Atualizar fornecedor</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/FornecedorController/editar" method="POST">
                <div class="form">
                    <div class="input input-nome-fornecedor">
                        <label for="nome">Nome da fornecedor</label>
                        <input type="text" name="nome-fornecedor" id="nome-fornecedor" oninput="validaInput(this)" placeholder="Brinquedos LTDA" maxlength="100" required>
                    </div>
                    <div class="input-tel-cid-est">
                        <div class="input input-telefone-fornecedor">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone-fornecedor" id="telefone" oninput="validaInputNumber(this)" placeholder="11 9 12345678" maxlength="11" required>
                        </div>
                        <div class="input input-cidade-fornecedor">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade-fornecedor" id="cidade" oninput="validaInput(this)" placeholder="Guarabira" maxlength="30" required>
                        </div>
                        <div class="input input-estado-fornecedor">
                            <label for="estado-fornecedor">Estado</label>
                            <input type="text" name="estado-fornecedor" id="estado" oninput="validaInput(this)" placeholder="MG" maxlength="2" maxlength="2" required>
                        </div>
                    </div>
                </div>

                <!-- levando o id do fornecedor via POST -->
                <input name="id_fornecedor" id="id-fornecedor" style="display: none;" required>

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