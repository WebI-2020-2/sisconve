<?php

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->produtoModel = $this->model('ProdutoModel');
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
                if (empty($formulario['categoria'])) :
                    $dados['categoria_erro'] = "Preencha o campo ";
                endif;

                if (empty($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Preencha o campo";
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Formato informado <b>inavalido</b>";
                else :
                    if ($this->produtoModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            var_dump($formulario);
        else :
            $dados = [
                'categoria' => '',
                'nome_produto' => '',

                'categoria_erro' => '',
                'nome_produto_erro' => '',

            ];
        endif;

        $this->view('produtos/cadastrarProdutos', $dados);
    }

    public function listarProdutos()
    {
        $dados = [
            'produtos' => $this->produtoModel->selectAll()
        ];

        $this->view('produtos/listarProdutos', $dados);
    }
}
