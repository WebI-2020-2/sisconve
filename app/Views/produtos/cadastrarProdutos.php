<form name="cadastrarPorduto" action="<?= URL ?>/ProdutosController/cadastrarProduto" method="post" class="text-center">
    <label for="">Categoria</label>
    <input type="text" name="categoria" id="categoria">
    <br>

    <label for="">Nome do produto</label>
    <input type="text" name="nome_produto" id="nome_produto" class="<?= $dados['nome_produto_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['nome_produto_erro'] ?>
    </div>
    <br>

    <input type="submit" value="Enviar" class="btn btn-primary">
</form>