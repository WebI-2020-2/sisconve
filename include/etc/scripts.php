<script src="../public/js/time.js"></script>
<script src="../public/js/modal-logoff.js"></script>
<script src="../public/js/realizarVenda.js"></script>
<script src="../public/js/metPagamento.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e386f7fbce.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php
    $lista = array(
        array(
            "id" => 1,
            "nome_produto" => "Pao de meuu",
            "valor_venda" => 80000,
            "quantidade" => 1
        ),
        array(
            "id" => 2,
            "nome_produto" => "Boneca",
            "valor_venda" => 80,
            "quantidade" => 2
        ),
        array(
            "id" => 3,
            "nome_produto" => "Colher",
            "valor_venda" => 20,
            "quantidade" => 1
        ),
        array(
            "id" => 4,
            "nome_produto" => "Xinelo",
            "valor_venda" => 1.6,
            "quantidade" => 1
        )
    ); 
    
?>

<script>

    var produtos = [];
    
    <?php 

        foreach($lista as $listas) { ?>
            var produto = {};
            produto.id = parseInt("<?= $listas['id']; ?>")
            produto.nome = "<?= $listas['nome_produto']; ?>"
            produto.valor = parseFloat("<?= $listas['valor_venda']; ?>")
            produto.quantidade = parseInt("<?= $listas['quantidade']; ?>")
            produtos.push(produto); <?php
        }

    ?>

    console.log(produtos)

</script>