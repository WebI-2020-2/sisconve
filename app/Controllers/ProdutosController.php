<?php

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('ProdutoModel');
    }


    public function cadastrarProduto()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'categoria' => trim($formulario['categoria']),
                'nome_produto' => trim($formulario['nome_produto']),

                'categoria_erro' => '',
                'nome_produto_erro' => '',

            ];
            if (in_array("", $formulario)) :
                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = "Preencha o campo <b>nome</b>";
                endif;

                if (empty($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Preencha o campo <b>usuario</b>";
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = "Preencha o campo <b>email</b>";
                endif;
            endif;
        else:
            $dados = [
                'categoria' => '',
                'nome_produto' => '',

                'categoria_erro' => '',
                'nome_produto_erro' => '',

            ];
        endif;
    }
}