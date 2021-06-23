<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/modal/add-item.css">
</head>

<body>
    <!-- Modal Add Item -->
    <div class="modal fade" id="add-item-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-add-items">
                <div class="modal-header modal-header-add-items float-right">
                    <div class="close-modal">
                        <img src="./img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
                <div class="content-box">
                    <div class="title-modal-add-item">
                        <h2>Adicionar Item</h2>
                    </div>
                    <div class="input-modal-add-item">
                        <div class="input-product">
                            <label for="nome-produto">Nome do produto</label>
                            <div class="input">
                                <input class="name-product" type="text" autocomplete="false" required>
                                <img src="./img/search-icon.svg" alt="Procurar">
                            </div>
                        </div>
                        <div class="input-quantidade">
                            <label for="quantidade-item">Quantidade</label>
                            <div class="input">
                                <input class="quant-product" type="text" min="1" value="1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons-modal">
                    <a class="cancel" href="#">
                        <span>Cancelar</span>
                    </a>
                    <a class="confirm" href="#">
                        <span>Adicionar item</span>
                    </a>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Sair</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

</body>

</html>