<form name="" action="<?= URL ?>/FuncionarioController/cadastrar" method="post" class="text-center">
    <label for="">Nome funcionario</label>
    <input type="text" id="nome_funcionario" name="nome_funcionario" class="<?= $dados['nome_funcionario_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['nome_funcionario_erro'] ?>
    </div>

    <br>
    <label for="">telefone</label>
    <input type="text" id="telefone" name="telefone" class="<?= $dados['telefone_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['telefone_erro'] ?>
    </div>
    <br>

    <label for="">cpf</label>
    <input type="text" id="cpf" name="cpf" class="<?= $dados['cpf_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['cpf_erro'] ?>
    </div>
    <br>

    <label for="">endereço</label>
    <input type="text" id="endereco" name="endereco" class="<?= $dados['endereco_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['endereco_erro'] ?>
    </div>
    <br>

    <label for="">cargo</label>
    <input type="text" id="cargo" name="cargo" class="<?= $dados['cargo_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['cargo_erro'] ?>
    </div>
    <br>

    <label for="">salario</label>
    <input type="text" id="salario" name="salario" class="<?= $dados['salario_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['salario_erro'] ?>
    </div>
    <br>

    <label for=""></label>
    <button type="submit">Cadastrar</button>
    <a href="<?= URL ?>/funcionario/listarFuncionario">listar</a>
</form>