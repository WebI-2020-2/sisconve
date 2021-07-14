<?php

class ProdutosController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'UsuarioController/login');
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
                    Sessao::mensagem('produto', 'Formato informado <b>inavalido</b>', 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'ProdutosController/listarProdutos');
                // URL::redirecionar('ProdutosController/listarProdutos');

                elseif ($this->produtoModel->verificarNomeProduto($formulario['nome_produto'])) :
                    Sessao::mensagem('produto', 'Produto já cadastrado', 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'ProdutosController/listarProdutos');
                // URL::redirecionar('ProdutosController/listarProdutos');

                else :
                    if ($this->produtoModel->insert($dados)) :
                        Sessao::mensagem('produto', 'Cadastro realizado como sucesso', 'bg-green');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'ProdutosController/listarProdutos');
                    // URL::redirecionar('ProdutosController/listarProdutos');
                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
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

    public function update()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = [
            'categoria' => trim($formulario['categoria']),
            'nome_produto' => trim($formulario['nome_produto']),
            'id_produto' => trim($formulario['id_produto']),

            'categoria_erro' => '',
            'nome_produto_erro' => '',

        ];
        if (Validar::validarCampoString($formulario['nome_produto'])) :
            $dados['nome_produto_erro'] = "Formato informado <b>inavalido</b>";
        else :
            $idInt = (int)$dados['id_produto'];
            if ($this->produtoModel->update($dados, $idInt)) :
                Sessao::mensagem('produto', 'Produto atualizado como sucesso', 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'ProdutosController/listarProdutos');
            // URL::redirecionar('ProdutosController/listarProdutos');
            else :
                die("Erro");

            endif;
        endif;

        $this->viewModal('modal/editar-produto-modal', $dados);
    }
}
