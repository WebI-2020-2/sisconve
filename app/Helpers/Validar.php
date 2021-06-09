<?php

class Validar
{

    public static function validarCampoNome($nome)
    {
        if (!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $nome)) :
            return true;
        else :
            return false;
        endif;
    }

    public static function validarCampoEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            return true;
        else :
            return false;
        endif;
    }
    public static function validarCampoCPF($cpf)
    {
        if(!preg_replace('/[^0-9]/is', '', $cpf)):
            return true;
        else: 
            return false;
        endif;

        if (strlen($cpf) != 11) :
            return false;
        endif;

        for ($t = 9; $t < 11; $t++) :
            for ($d = 0, $c = 0; $c < $t; $c++) :
                $d += $cpf[$c] * (($t + 1) - $c);
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) :
                return false;
            endif;
        endfor;
        return true;
    }

    public static function validarCampoSalario($salario)
    {
        if(!preg_replace('/[^0-9]/is', '', $salario)):
            return true;
        else:
            return false;
        endif;
    }
}
