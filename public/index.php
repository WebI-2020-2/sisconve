<?php
include './../app/Libraries/Rota.php';
include './../app/Libraries/Database.php';
$db = new Database();
var_dump($db);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
        $rotas = new Rota();
    ?>
    
</body>
</html>