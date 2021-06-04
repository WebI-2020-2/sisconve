<form name="cadastrar" action="<?= URL ?>/UsuarioController/login" method="post" class="text-center">
        

        <label for="">Usuário</label>
        <br>
        <input type="text" name="usuario" id="usuario" v class="<?= $dados['usuario_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['usuario_erro'] ?>
        </div>
        <br>

        

        <label for="">Senha</label>
        <br>
        <input type="password" name="senha" name="senha"  class="<?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?= $dados['senha_erro'] ?>
        </div>
        <br>

        

        <br>
        <input type="submit">
        <a href="<?= URL?>/usuarios/login">login</a>
    </form>