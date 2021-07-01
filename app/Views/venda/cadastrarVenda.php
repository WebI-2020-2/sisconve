<form name="cadastrar" action="<?= URL ?>/VendaController/cadastrar" method="post" class="text-center">
    <label for="">Quantidade</label>
    <input type="text" id="quantidade" name="quantidade">

    <br>

    <label for="">Valor</label>
    <input type="number" name="valor_unitario" id="valor_unitario">


    <br>

    <label for="">Numero de parcelas</label>
    <input type="number" name="num_parcelas" id="num_parcelas">

    <br>

    <input type="submit" class="btn btn-primary" value="Enviar">

</form>