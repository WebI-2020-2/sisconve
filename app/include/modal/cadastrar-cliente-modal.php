<div class="modal fade" id="cadastrar-cliente-modal" tabindex="-1" aria-labelledby="cadastrar-cliente-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/ClientesController/cadastrar" method="POST">
                <div>
                    <!-- class="d-flex justify-content-center" -->
                    <div class="input input-nome-cliente">
                        <label for="nome-cliente">Nome do cliente</label>
                        <input type="text" oninput="validaInput(this)" name="nome" placeholder="nome do cliente" required>
                    </div>
                    <div class="input input-catagoria">
                        <label for="cpf">CPF</label>
                        <input type="text" oninput="validaInput(this)" name="cpf" required>
                    </div>
                    <div class="input input-ddd">
                        <label for="ddd">DDD</label>
                        <input type="text" oninput="validaInput(this)" name="ddd" required>
                    </div>
                    <div class="input input-num_telefone">
                        <label for="num_telefone">Telefone</label>
                        <input type="text" oninput="validaInput(this)" name="num_telefone" required>
                    </div>
                    <div class="input input-numero">
                        <label for="numero">Número</label>
                        <input type="text" oninput="validaInput(this)" name="numero" required>
                    </div>
                    <div class="input input-rua">
                        <label for="rua">Rua</label>
                        <input type="text" oninput="validaInput(this)" name="rua" required>
                    </div>
                    <div class="input input-bairro">
                        <label for="bairro">Bairro</label>
                        <input type="text" oninput="validaInput(this)" name="bairro" required>
                    </div>
                    <div class="input input-cidade">
                        <label for="cidade">Cidade</label>
                        <input type="text" oninput="validaInput(this)" name="cidade" required>
                    </div>
                    <div class="input input-estado">
                        <label for="estado">Estado</label>
                        <input type="text" oninput="validaInput(this)" name="estado" required>
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