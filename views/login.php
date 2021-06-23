<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISCONVE - Login</title>
        <link rel="stylesheet" href="../public/style/main.css">
        <link rel="stylesheet" href="../public/style/login.css">
    </head>
    <body>
        <div id="container">
            <div class="login-form">
                <div class="main-items">
                    <div class="title-logo">
                        <h1>SISCONVE</h1>
                    </div>
                    <div class="inputs">
                        <div class="login">
                            <label class="label-login" for="login">Usuário</label>
                            <div class="input">
                                <img src="../public/img/icon-user.svg" alt="Usuário">
                                <input type="text" name="login" autocomplete="off" maxlength="50">
                            </div>
                        </div>
                        <div class="login">
                            <label class="label-pw" for="password">Senha</label>
                            <div class="input">
                                <img src="../public/img/icon-pw.svg" alt="Cadeado">
                                <input type="password" name="password" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="submit">
                        <button>Login</button>
                    </div>
                    <div class="mini-footer">
                        <a href="#">
                            <img src="../public/img/icon-github.svg" alt="">
                        </a>
                        <a href="dashboard.php">Esqueci minha senha</a>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>