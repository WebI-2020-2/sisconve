<form name="cadastrar" action="<?= URL ?>/TelefoneController/cadastrar" method="post" class="text-center">

    <label for="">Cliente</label>
    <input type="text" id="cliente_id" name="cliente_id" class="<?= $dados['cliente_id_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['cliente_id_erro'] ?>
    </div>
    <br>

    <label for="">Telefone</label>
    <input type="text" id="num_telefone" name="num_telefone" class="<?= $dados['num_telefone_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['num_telefone_erro'] ?>
    </div>

    <br>

    <label for="">DDD</label>
    <input type="text" id="ddd" name="ddd"class="<?= $dados['ddd_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['ddd_erro'] ?>
    </div>

    <br>

    <br>

    <!-- <label for="">Whatsapp</label>
    <input type="text" id="whatsapp" name="whatsapp"class="<?= $dados['whatsapp_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['whatsapp_erro'] ?>
    </div> -->

    <br>

    <input type="submit" class="btn btn-primary" value="enviar">
</form>