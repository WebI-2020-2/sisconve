<nav>
    <div class="logo">
        <a href="./dashboard.php">SISCONVE</a>
    </div>
    <div class="user-area">
        <span id="date-time"></span>
        <img class="divisor" src="../public/img/separador.svg" alt="Separador">
        <span class="username"><?=$_SESSION["USUARIO_NOME_COMPLETO"]?></span>
        <img class="user-img" src="../public/img/default-user.svg" alt="Usuário">

        <div class="dropdown show">
            <img class="arrow-icon dropdown" id="dropdownMenuLink" data-toggle="dropdown" src="../public/img/arrow-icon.svg" alt="Seta Configuração">
            <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownMenuLink">
                <a class="" href="#">
                    <div class="item-menu">
                        <i class="fas fa-user"></i>
                        <p>Minha Conta</p>
                    </div>
                </a>
                <a class="" href="#">
                    <div class="item-menu">
                        <i class="fas fa-cog"></i>
                        <p>Configurações</p>
                    </div>
                </a>
                <a class="" href="<?= URL ?>/UsuarioController/sair">
                    <div class="item-menu">
                        <i class="fas fa-power-off"></i>
                        <p>Sair do sistema</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>
