<form name="cadastrar" action="<?= URL ?>/CompraController/cadastrar" method="post" class="text-center">

    <label for="">Funcionario</label>
    <input type="text" id="funcionario_id" name="funcionario_id">

    <br>

    <label for="">Fornecedor</label>
    <input type="text" id="fornecedor_id" name="fornecedor_id">


    <br>

    <label for="">Parcelas</label>
    <input type="text" id="parcelas" name="parcelas" class="<?= $dados['parcelas_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['parcelas_erro'] ?>
    </div>

    <br>
    <input type="submit" value="Comprar" class="btn btn-primary">

</form>