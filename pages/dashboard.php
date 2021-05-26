<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <?php include("../include/page-dashboard.php") ?>
        </div>
        <!-- box-center fim -->

    </div>

    <!-- Scripts -->
    <?php include("../include/etc/scripts.php") ?>

</body>

</html>