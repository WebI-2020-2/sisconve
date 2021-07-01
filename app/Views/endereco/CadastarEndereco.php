<form name="cadastrar" action="<?= URL ?>/EnderecoController/cadastrar" method="post" class="text-center">
    <label for="">Cliente</label>
    <input type="text" id="cliente_id" name="cliente_id" class="<?= $dados['cliente_id_erro'] ? 'is-invalid' : '' ?>">
    <div class="invalid-feedback">
        <?= $dados['cliente_id_erro'] ?>
    </div>
    <br>

    <label for="">Rua</label>
    <input type="text" id="rua " name="rua" class="<?= $dados['rua_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['rua_erro'] ?>
    </div>

    <br>

    <label for="">Bairro</label>
    <input type="text" id="bairro " name="bairro"class="<?= $dados['bairro_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['bairro_erro'] ?>
    </div>

    <br>

    <label for="">Cidade</label>
    <input type="text" id="cidade " name="cidade" class="<?= $dados['cidade_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['cidade_erro'] ?>
    </div>

    <br>

    <label for="">Estado</label>
    <input type="text" id="estado " name="estado"class="<?= $dados['estado_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['estado_erro'] ?>
    </div>

    <br>

    <label for="">Numero</label>
    <input type="text" id="numero " name="numero"class="<?= $dados['numero_erro'] ? 'is-invalid' : '' ?>">

    <div class="invalid-feedback">
        <?= $dados['numero_erro'] ?>
    </div>
    <br>

    <input type="submit" class="btn btn-primary" value="enviar">
</form>