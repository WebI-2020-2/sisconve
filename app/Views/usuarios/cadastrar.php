  <form name="cadastrar" action="<?= URL ?>/UsuarioController/cadastrar" method="post" class="text-center">
        <label for="">Nome</label>
        <br>
        <input type="text" id="nome" name="nome"  class="<?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['nome_erro'] ?>
        </div>
        <br>

        <label for="">Usuário</label>
        <br>
        <input type="text" name="usuario" id="usuario" class="<?= $dados['usuario_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['usuario_erro'] ?>
        </div>
        <br>

        <label for="">E-mail</label>
        <br>
        <input type="email" name="email" id="email"  class="<?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['email_erro'] ?>
        </div>
        <br>

        <label for="">Senha</label>
        <br>
        <input type="password" name="senha" name="senha"  class="<?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['senha_erro'] ?>
        </div>
        <br>

        <label for="">Confirmar Senha</label>
        <br>
        <input type="password" name="confirmar_senha" name="confirmar_senha"  class="<?= $dados['confirmar_senha_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['confirmar_senha_erro'] ?>
        </div>
        <br>

        <br>
        <input type="submit">
        <a href="<?= URL?>/usuarios/login">login</a>
    </form>