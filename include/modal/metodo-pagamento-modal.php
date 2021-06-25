<div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Método de Pagamento</h5>
                <div class="text-right">
                    <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <select name="metodo-pagamento" id="metodo-pagamento" required>
                    <option value="0" selected>À VISTA</option>
                    <option value="1">À PRAZO</option>
                    <option value="2">CARTÃO DÉBITO</option>
                    <option value="3">CARTÃO CRÉDITO</option>
                    <option value="4">CARNÊ</option>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>