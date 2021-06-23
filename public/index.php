<?php
session_start();
include './../app/autoload.php';
include './../app/config.php';
// include './../app/Libraries/Rota.php';
// include './../app/Libraries/Database.php';
// $db = new Database();
// var_dump($db);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/login.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/box-center.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/main.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/sell-products.css">
    <link rel="stylesheet" href="<?= URL?>/public/css/sidebar.css">
</head>
<body>
    <?php
        $rotas = new Rota();
    ?>
    <script src="<?= URL?>/public/js/metPagamento.js"></script>
    <script src="<?= URL?>/public/js/modal-logoff.js"></script>
    <script src="<?= URL?>/public/js/time.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>