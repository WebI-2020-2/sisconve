<form name="cadastrarCategoria" action="<?= URL ?>/CategoriaController/cadastrarCategoria" method="post" class="text-center">

    <label for="">Nome da categoria</label>
    <input type="text" id="nomecategoria" name="nomecategoria" class="<?= $dados['nomecategoria_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['nomecategoria_erro'] ?>
    </div>
    <br>
    <input type="submit">
</form>