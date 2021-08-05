<div class="modal fade" id="cadastrar-cliente-modal" tabindex="-1" aria-labelledby="cadastrar-cliente-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cad-cliente modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <form action="<?= URL ?>/ClientesController/cadastrar" method="POST">
                    <div class="input input-nome-cliente">
                        <label for="nome-cliente">Nome do cliente</label>
                        <input type="text" oninput="validaInput(this)" name="nome" placeholder="José da Silva" maxlength="100" required>
                    </div>
                    <div class="input-ddd-tel-cpf">
                        <div class="input input-catagoria">
                            <label for="cpf">CPF</label>
                            <input type="text" oninput="validaInputNumber(this)" name="cpf" placeholder="123.456.789-10" maxlength="11" required>
                        </div>
                        <div class="input input-ddd">
                            <label for="ddd">DDD</label>
                            <input type="text" oninput="validaInputNumber(this)" name="ddd" maxlength="2" placeholder="38" required>
                        </div>
                        <div class="input input-num-telefone">
                            <label for="num_telefone">Telefone</label>
                            <input type="text" oninput="validaInputNumber(this)" name="num_telefone" placeholder="9 12345678" maxlength="9" required>
                        </div>
                    </div>
                    <div class="input-endereco-num">
                        <div class="input input-rua">
                            <label for="rua">Endereço</label>
                            <input type="text" oninput="validaInput(this)" name="rua" placeholder="Rua dos Cocais" maxlength="100" required>
                        </div>
                        <div class="input input-numero">
                            <label for="numero">Número</label>
                            <input type="text" oninput="validaInputNumber(this)" name="numero" placeholder="123" maxlength="5" required>
                        </div>
                    </div>
                    <div class="input-bairro-cidade-estado">
                        <div class="input input-bairro">
                            <label for="bairro">Bairro</label>
                            <input type="text" oninput="validaInput(this)" name="bairro" placeholder="Vila Nova" maxlength="30" required>
                        </div>
                        <div class="input input-cidade">
                            <label for="cidade">Cidade</label>
                            <input type="text" oninput="validaInput(this)" name="cidade" placeholder="Americana" maxlength="30" required>
                        </div>
                        <div class="input input-estado">
                            <label for="estado">Estado</label>
                            <input type="text" oninput="validaInput(this)" maxlength="2" placeholder="SP" name="estado" required>
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
</div>