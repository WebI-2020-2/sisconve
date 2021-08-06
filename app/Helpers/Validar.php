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
        if (!preg_replace('/[^0-9]/is', '', $salario)) :
            return true;
        else :
            return false;
        endif;
    }

    public static function dataBr($data)
    {
        if (isset($data)) :
            return date('d/m/Y', strtotime($data));
        else :
            return false;
        endif;
    }

    public static function lucro($numero)
    {
        return number_format($numero, 2, ',', '');
    }

    public static function upperCase($upperCase)
    {
        return mb_strtoupper($upperCase);
    }

    public static function formatCpf($cpf)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $cpf);
        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        } 
        
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }

    public static function masc_tel($TEL) {
    $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
      if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
      return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
      }
      if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
      return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
      }
      if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
      return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
      }
      if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
      return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
      }
      if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
      return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
      }
  }

}
