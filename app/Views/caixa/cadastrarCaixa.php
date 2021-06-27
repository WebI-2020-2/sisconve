<form name="cadastrar" action="<?= URL ?>/CaixaController/cadastrar" method="post" class="text-center">
    <label for="">valor em caixa</label>
    <input type="text" name="valor_em_caixa" id="valor_em_caixa" class="<?= $dados['valor_em_caixa_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['valor_em_caixa_erro'] ?>
    </div>
    <br>

    <input type="submit" value="Enviar">

</form>
