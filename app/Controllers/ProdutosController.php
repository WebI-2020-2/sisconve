<?php

class ProdutosController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
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
                        Sessao::mensagem('produto', 'Cadastro realizado como sucesso', 'bg-green');
                        header("Location:".URL.DIRECTORY_SEPARATOR.'ProdutosController/listarProdutos');
                        // URL::redirecionar('ProdutosController/listarProdutos');
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

        $this->viewModal('modal/cadastrar-produto-modal', $dados);
    }

    public function listarProdutos()
    {
        $dados = [
            'produtos' => $this->produtoModel->selectAll()
        ];

        $this->view('produtos/listarProdutos', $dados);
    }

    public function visualizar($id)
    {
        $produtos = $this->produtoModel->selectById($id);
        $dados = [
            'produtosListar' => $produtos
        ];

        $this->view('produtos/visualizar', $dados);
    }
}
