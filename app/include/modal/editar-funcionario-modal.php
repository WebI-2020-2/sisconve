<?php
include_once './../app/Models/CaixaModel.php';
$caixa = new CaixaModel();
$lista_caixas = $caixa->selectAll();
?>
<div class="modal fade" id="editar-funcionario-modal" tabindex="-1" aria-labelledby="editar-funcionario-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cad-funcionario modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Atualizar funcionário</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <form action="<?= URL ?>/FuncionarioController/editar" method="POST">
                    <div class="input input-nome-funcionario">
                        <label for="nome_funcionario">Nome</label>
                        <input type="text" oninput="validaInput(this)" name="nome_funcionario" id="nome" placeholder="José da Silva" maxlength="100" required>
                    </div>
                    <div class="input-cpf-tel">
                        <div class="input input-cpf">
                            <label for="cpf">CPF <small>(somente números)</small></label>
                            <input type="text" oninput="validaInputNumber(this)" name="cpf" id="cpf" placeholder="123.456.789-10" maxlength="11" required>
                        </div>
                        <div class="input input-num-telefone">
                            <label for="telefone">Telefone + DDD <small>(somente números)</small></label>
                            <input type="text" oninput="validaInputNumber(this)" name="telefone" id="telefone" placeholder="(38) 9 12345678" maxlength="11" required>
                        </div>
                    </div>
                    <div class="input input-email">
                        <label for="email">E-mail</label>
                        <input type="text" oninput="validaInput(this)" name="email" id="email" placeholder="funcionario@email.com" maxlength="30" required>
                    </div>
                    <div class="input input-endereco">
                        <label for="endereco">Endereço <small>(completo)</small></label>
                        <input type="text" oninput="validaInput(this)" name="endereco" id="endereco" placeholder="Rua dos Cocais, num 25 Bairro Centro, Espinosa-MG" maxlength="100" required>
                    </div>
                    <div class="input-cargo-salario">
                        <div class="input input-cargo" id="input-cargo">
                            <label for="cargo">Cargo</label>
                            <input type="text" oninput="validaInput(this)" name="cargo" id="cargo" placeholder="Caixa" maxlength="20" required>
                        </div>
                        <div class="input input-salario" id="input-salario">
                            <label for="salario">Salário R$ <small>(somente números)</small></label>
                            <input type="number" oninput="validaInput(this)" name="salario" id="salario" placeholder="1500,00" min="0" max="99999" required>
                        </div>
                    </div>
                    <div id="input-acesso-caixa" style="display: none;">
                        <div class="input-acesso-caixa">
                            <div class="input input-caixa">
                                <label for="caixa">Caixa</label>
                                <select name="caixa" id="caixa" disabled>
                                    <option value="" selected disabled>Selecione</option>
                                    <?php foreach ($lista_caixas as $caixas) : ?>
                                        <option value="<?= $caixas->id_caixa ?>">
                                            Caixa: 0<?= $caixas->numero_caixa ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input input-acesso">
                                <label for="acess-level">Nível de acesso sistema</label>
                                <select name="acess-level" id="acesso" disabled>
                                    <option value="" selected disabled>Selecione</option>
                                    <option value="1">Usuário gerente</option>
                                    <option value="2">Usuário caixa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- levando o id do funcionario via POST -->
                    <input name="id_funcionario" id="id-funcionario" style="display: none;" required>

                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal">
                            Cancelar
                            <img src="../public/img/block-icon.svg" alt="Cancelar">
                        </button>
                        <button type="submit" class="submit" id="submit">
                            Atualizar
                            <img src="../public/img/check-icon.svg" alt="Atualizar">
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>