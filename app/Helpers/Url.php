<?php

class Url {

    public static function redirecionar($url){
        //header - Envia um cabeçalho HTTP
        //DIRECTORY_SEPARATOR - coloca o caracter barra que é o separador de diretorio
        header("Location:".URL.DIRECTORY_SEPARATOR.$url);
    }

}