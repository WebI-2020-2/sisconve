<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Categorias</title>
    <link rel="shortcut icon" href="../public/img/favicon.svg" type="image/x-icon">
    <!-- Estilos -->
    <?php include("../include/etc/styles.php") ?>
</head>

<body>

    <!-- nav bar inicio -->
    <?php include("../include/parts/navbar.php") ?>
    <!-- navbar fim -->

    <div id="container">

        <!-- inicio menu-bar (barra lateral)-->
        <?php include("../include/parts/menubar.php") ?>
        <!-- menu-bar fim -->

        <!-- box-center início (area central) -->
        <div class="content-center">
            <?php 
                include('../include/pages/categorias.php');
            ?>
        </div>
        <!-- box-center fim -->

    </div>



</body>
<?php
    // include dos scripts js
    include("../include/etc/scripts.php")
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(function() {
        $("#search").keyup(function() {
            var texto = $(this).val();
            $("#item-details").each(function() {
                var resultado = $(this).text().toUpperCase().indexOf(' ' + texto.toUpperCase());
                if (resultado < 0) {
                    $(this).fadeOut()
                } else {
                    $(this).fadeIn();
                }
            });
        });
    });
</script>

</html>