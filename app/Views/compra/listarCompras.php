<!DOCTYPE html>
<html lang="pt_br">

<head>
    <title>SISCONVE - Compras</title>
    <?php include("./../app/include/etc/styles.php") ?>
</head>

<body>

    <?php include("./../app/include/parts/navbar.php"); ?>

    <div id="container">

        <?php include("./../app/include/parts/menubar.php"); ?>

        <div class="content-center">

            <?php include("./../app/include/pages/compras/listar-compras.php"); ?>

        </div>

    </div>

</body>

<?php include("./../app/include/etc/scripts.php"); ?>

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