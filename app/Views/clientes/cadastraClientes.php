  <form name="cadastrar" action="<?= URL ?>/ClientesController/cadastrar" method="post" class="text-center">
      <br>
      <label for="">Nome</label>
      <input type="text" id="nome" name="nome" class="<?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
      <div class="invalid-feedback">
          <?= $dados['nome_erro'] ?>
      </div>
      <br>
      <label for="">CPF</label>
      <input type="text" id="cpf" name="cpf" class="<?= $dados['cpf_erro'] ? 'is-invalid' : '' ?>">
      <div class="invalid-feedback">
          <?= $dados['cpf_erro'] ?>
      </div>
      <br>

      <input type="submit" value="Cadastar" class="btn btn-primary">
  </form>