<!-- Modal Logoff -->
<div class="modal fade" id="logoff-modal" tabindex="-1" aria-labelledby="logoff-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-logoff">
            <div class="modal-header float-right">
                <h5>Sair do sistema</h5>
                <div class="close-modal">
                    <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                </div>
            </div>
            <div>
                <h1 class="text-center">Deseja sair do sistema?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a type="submit" href="<?= URL ?>/UsuarioController/sair" class="btn btn-primary">Sair</a>
            </div>
        </div>
    </div>
</div>