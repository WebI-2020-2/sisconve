<!-- Modal Logoff -->
<div class="modal fade" id="logoff-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-logoff">
            <div class="modal-header">
                <h5>Sair do sistema</h5>
                <div class="close-modal">
                    <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                </div>
            </div>
            <div class="modal-center">
                <h2 class="text-center">Deseja sair do sistema?</h1>
            </div>
            <div class="modal-footer">
                <button class="cancel" type="button" data-dismiss="modal">Não</button>
                <a class="exit" type="submit" href="<?= URL ?>/FuncionarioController/sair">Sim</a>
            </div>
        </div>
    </div>
</div>