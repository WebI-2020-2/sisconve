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
                <div class="form">
                    <div class="input input-nome-fornecedor">
                        <label for="nome">Nome do fornecedor</label>
                        <input type="text" name="nome-fornecedor" oninput="validaInput(this)" placeholder="Brinquedos LTDA" maxlength="100" required>
                    </div>
                    <div class="input-tel-cid-est">
                        <div class="input input-telefone-fornecedor">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone-fornecedor" oninput="validaInputNumber(this)" placeholder="11 9 12345678" maxlength="11" required>
                        </div>
                        <div class="input input-cidade-fornecedor">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade-fornecedor" oninput="validaInput(this)" placeholder="Guarabira" maxlength="30" required>
                        </div>
                        <div class="input input-estado-fornecedor">
                            <label for="estado-fornecedor">Estado</label>
                            <input type="text" name="estado-fornecedor" oninput="validaInput(this)" placeholder="MG" maxlength="2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">
                        Cancelar
                        <img src="../public/img/block-icon.svg" alt="Cancelar">
                    </button>
                    <button type="submit" class="submit">
                        Cadastrar
                        <img src="../public/img/check-icon.svg" alt="Cadastrar">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>