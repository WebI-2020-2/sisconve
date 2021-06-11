<?php

class Validar
{
    // Validar Nome
    public static function validarCampoString($string)
    {
        if (!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $string)) :
            return true;
        else :
            return false;
        endif;
    }

    //Validar Email
    public static function validarCampoEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            return true;
        else :
            return false;
        endif;
    }

    // Validar CPF 
    public static function validarCampoCPF($cpf)
    {
        // if (strlen($cpf) != 11) {
        //     return false;
        // }
        // if (preg_match('/(\d)\1{10}/', $cpf)) {
        //     return false;
        // }
        // for ($t = 9; $t < 11; $t++) {
        //     for ($d = 0, $c = 0; $c < $t; $c++) {
        //         $d += $cpf[$c] * (($t + 1) - $c);
        //     }
        //     $d = ((10 * $d) % 11) % 10;
        //     if ($cpf[$c] != $d) {
        //         return false;
        //     }
        // }
        // return true;
    }

    public static function validarCampoNumerico($salario)
    {
        if (!preg_replace('/[^0-9]/is','', $salario)) :
            return true;
        else :
            return false;
        endif;
    }
}
