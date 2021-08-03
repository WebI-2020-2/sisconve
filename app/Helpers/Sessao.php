<?php

class Sessao {

    public static function mensagem($nome, $texto = null, $classe = null){

        if(!empty($nome)):
            if(!empty($texto) && empty($_SESSION[$nome])):
                if(!empty($_SESSION[$nome])):
                    unset($_SESSION[$nome]);
                endif;

                $_SESSION[$nome] = $texto;
                $_SESSION[$nome.'classe'] = $classe;

                elseif(!empty($_SESSION[$nome]) && empty($texto)): 
                    $classe = !empty($_SESSION[$nome.'classe']) ? $_SESSION[$nome.'classe'] : 'bg-green';
                    //echo '<div class="'.$classe.'">'.$_SESSION[$nome].'</div>';
                    echo '
                        <div class="toast fade show" id="toast">
                            <div class="toast-body '.$classe.'">
                                '.$_SESSION[$nome].'
                            </div>
                        </div>
                    ';
                
                    unset($_SESSION[$nome]);
                    unset($_SESSION[$nome.'classe']);
            endif;
        endif;
        
    }

    public static function estaLogado(){
        if (isset($_SESSION['FUNCIONARIO_ID'])) :
            return true;
        else:
            return false;
        endif;
    }

}