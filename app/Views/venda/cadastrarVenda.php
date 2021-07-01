<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Categorias</title>
    <link rel="shortcut icon" href="./../public/img/favicon.svg" type="image/x-icon">
    <!-- Estilos -->
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body onload="countTableRows()">

    <!-- nav bar inicio -->
    <?php include("./../app/include/parts/navbar.php") ?>
    <!-- navbar fim -->

    <div id="container">

        <!-- inicio menu-bar (barra lateral)-->
        <?php include("./../app/include/parts/menubar.php") ?>
        <!-- menu-bar fim -->

        <!-- box-center início (area central) -->
        <div class="content-center">
            <?php 
                include("./../app/include/pages/vendas/realizar-venda.php");

            ?>
        </div>
        <!-- box-center fim -->
        
    </div>
    
</body>

<?php include("./../app/include/etc/scripts.php"); ?>

</html>

<!-- <form name="cadastrar" action="<?= URL ?>/VendaController/cadastrar" method="post" class="text-center">
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

</form> -->