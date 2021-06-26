<body>
    <div id="container">
        <form name="cadastrar" action="<?= URL ?>/UsuarioController/login" method="post" class="text-center">
            <div class="login-form">
                <div class="main-items">
                    <div class="title-logo">
                        <h1>SISCONVE</h1>
                        <h2><?php Sessao::mensagem('usuario')?></h2>
                    </div>
                    <div class="inputs">
                        <div class="login">
                            <label class="label-login" for="login">Usuário</label>
                            <div class="input">
                                <img src="../public/img/icon-user.svg" alt="Usuário">
                                <input type="text" name="usuario" id="usuario" autocomplete="off" maxlength="50">
                            </div>
                            <?php if ($dados['usuario_erro']) : ?>
                                <div class="alert">
                                    <small>Necessário inserir um <b>usuário</b>!</small>
                                </div> 
                            <?php endif ?>
                        </div>
                        <div class="login">
                            <label class="label-pw" for="password">Senha</label>
                            <div class="input">
                                <img src="../public/img/icon-pw.svg" alt="Cadeado">
                                <input type="password" name="senha" id="senha" maxlength="50">
                            </div>
                            <?php if ($dados['senha_erro']) : ?>
                                <div class="alert">
                                    <small>Necessário inserir uma <b>senha</b>!</small>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="submit">
                        <button type="submit">
                            <span>Login</span>
                        </button>
                    </div>
                    <div class="mini-footer">
                        <a href="dashboard.php">Esqueci minha senha</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- <form name="cadastrar" action="<?= URL ?>/UsuarioController/login" method="post" class="text-center">
    <label for="">Usuário</label>
    <br>
    <input type="text" name="usuario" id="usuario" class="<?= $dados['usuario_erro'] ? 'is-invalid' : '' ?>">
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
    <a href="<?= URL ?>/usuarioController/login">login</a>
    <a href="<?= URL ?>/usuarioController/listar">listar</a>
</form>