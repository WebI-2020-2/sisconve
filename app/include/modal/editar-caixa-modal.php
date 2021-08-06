<div class="modal fade" id="editar-caixa-modal" tabindex="-1" aria-labelledby="editar-caixa-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Atualizar caixa</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                <div class="form">
                    <div class="input-num-caixa">
                        <label for="num-caixa">Número do caixa <small>(somente números)</small></label>
                        <input type="text" name="num-caixa" id="num-caixa" oninput="validaInputNumber(this)" maxlength="99" placeholder="Ex.: 000001" required>
                    </div>
                </div>

                <!-- levando o id da caixa via POST -->
                <input name="id_caixa" id="id-caixa" style="display: none;" required>

                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">
                        Cancelar
                        <img src="../public/img/block-icon.svg" alt="Cancelar">
                    </button>
                    <button type="submit" class="submit">
                        Atualizar
                        <img src="../public/img/check-icon.svg" alt="Atualizar">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>