<?php
include './../app/Models/ClienteModel.php';

$cliente = new ClienteModel();
$lista_cliente = $cliente->selectAll();

?>


<div class="modal fade" id="client-modal" tabindex="-1" aria-labelledby="client-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Selecione o Cliente</h5>
                <div class="text-right">
                    <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <select name="cliente" id="nome-cliente">
                    <?php foreach ($lista_cliente as $cliente) : ?>
                        <option value="<?= $cliente->id_cliente?>" selected><?=$cliente->nome_cliente?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>