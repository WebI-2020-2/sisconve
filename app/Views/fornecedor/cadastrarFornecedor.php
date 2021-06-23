<br>
<form name="cadastrarCategoria" action="<?= URL ?>/FornecedorController/cadastrar" method="post" class="text-center">

    <label for="">Nome</label>
    <input type="text" id="nome" name="nome" class="<?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['nome_erro'] ?>
    </div>
    <br>

    <label for="">Telefone</label>
    <input type="text" id="telefone" name="telefone" class="<?= $dados['telefone_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['telefone_erro'] ?>
    </div>
    <br>

    <label for="">Cidade</label>
    <input type="text" id="cidade" name="cidade" class="<?= $dados['cidade_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['cidade_erro'] ?>
    </div>
    <br>

    <label for="">Estado</label>
    <input type="text" id="estado" name="estado" class="<?= $dados['estado_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['estado_erro'] ?>
    </div>
    <br>
    
    <input type="submit" class="btn btn-primary">
</form>