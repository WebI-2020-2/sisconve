<!DOCTYPE html>
<html lang="pt_br">

<head>
    <title>SISCONVE - Vendas</title>
    <?php include("../src/includes/etc/head-styles.php") ?>
</head>

<body>

    <?php include("../src/includes/parts/navbar.php"); ?>

    <div id="container">

        <?php include("../src/includes/parts/menubar.php"); ?>

        <div class="content-center">

            

        </div>

    </div>

</body>

<?php include("../src/includes/etc/scripts.php"); ?>

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



<!-- <?php
include_once './../app/Controllers/VendaController.php';
foreach ($dados['vendas'] as $venda) : ?>
        <?= $venda->id_venda ?>
        <?= $venda->id_caixa ?>
        <?= $venda->id_cliente ?>
        <?= $venda->num_parcelas ?>
        <?= $venda->valor_total ?>
        <?= $venda->data_venda ?>
<?php endforeach ?> -->