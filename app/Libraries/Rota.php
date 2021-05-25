<?php

class Rota {

    public function __construct()
    {
       $this->url();

       var_dump($this->url());
    }

    // retorna a url em um array
    private function url(){
        //o filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma URL
        $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
        //verifica se a url existe
        if(isset($url)):
            //trim — Retira espaço no ínicio e final de uma string
            //rtrim — Retira espaço em branco (ou outros caracteres) do final da string
            $url = trim(rtrim($url,'/'));
            //explode — Divide uma string em strings, retorna um array 
            $url = explode('/', $url);
            return $url;
        endif;
    }
}