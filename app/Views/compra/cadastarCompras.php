<form name="cadastrar" action="<?= URL ?>/CompraController/cadastrar" method="post" class="text-center">
    <!-- Compra -->
    <label for="">Parcelas</label>
    <input type="text" name="parcelas" id="parcelas">

    <br>

    <label for="">Nome do produto</label>
    <input type="text" name="nome_produto" id="nome_produto">

    <br>

    <!-- item_compra -->
    <label for="">Ipi</label>
    <input type="text" name="ipi" id="ipi">

    <br>

    <label for="">Frete</label>
    <input type="text" name="frete" id="frete">

    <br>

    <label for="">Icms</label>
    <input type="text" name="icms" id="icms">

    <br>

    <label for="">Quantidade</label>
    <input type="text" name="quantidade" id="quantidade">

    <br>

    <label for="">Preco de compra</label>
    <input type="text" name="preco_compra" id="preco_compra">

    <br>
    <input type="submit" value="Comprar" class="btn btn-primary">

</form>