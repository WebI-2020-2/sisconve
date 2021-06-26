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
      <label for="">Rua</label>
      <input type="text" id="rua " name="rua" class="<?= $dados['rua_erro'] ? 'is-invalid' : '' ?>">
      <div class="invalid-feedback">
          <?= $dados['rua_erro'] ?>
      </div>
      <br>
      <label for="">Bairro</label>
      <input type="text" id="bairro " name="bairro" class="<?= $dados['bairro_erro'] ? 'is-invalid' : '' ?>">
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
      <input type="text" id="estado " name="estado" class="<?= $dados['estado_erro'] ? 'is-invalid' : '' ?>">
      <div class="invalid-feedback">
          <?= $dados['estado_erro'] ?>
      </div>
      <br>
      <label for="">Numero</label>
      <input type="text" id="numero " name="numero" class="<?= $dados['numero_erro'] ? 'is-invalid' : '' ?>">
      <div class="invalid-feedback">
          <?= $dados['numero_erro'] ?>
      </div>
      
      <br>

      <label for="">Telefone</label>
      <input type="text" id="num_telefone" name="num_telefone" class="<?= $dados['num_telefone_erro'] ? 'is-invalid' : '' ?>">

      <div class="invalid-feedback">
          <?= $dados['num_telefone_erro'] ?>
      </div>

      <br>

      <label for="">DDD</label>
      <input type="text" id="ddd" name="ddd" class="<?= $dados['ddd_erro'] ? 'is-invalid' : '' ?>">

      <div class="invalid-feedback">
          <?= $dados['ddd_erro'] ?>
      </div>

      <br>
      <input type="submit" value="Cadastar" class="btn btn-primary">
  </form>