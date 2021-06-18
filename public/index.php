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
</head>
<body>
    <?php
        include './../app/Views/topo.php';
        $rotas = new Rota();
    ?>
    
</body>
</html>