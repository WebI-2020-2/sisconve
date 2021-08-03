<?php
class CompraController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->compraModel = $this->model('CompraModel');
        $this->produtoModel = $this->model('ProdutoModel');
        $this->fornecedorModel = $this->model('FornecedorModel');
        $this->itemCompraModel = $this->model('ItemCompraModel');
    }

    public function index()
    {
    }
    public function listarCompras()
    {
        $dados = [
            'compras' => $this->compraModel->selectAll()
        ];
        $this->view('compra/listarCompras', $dados);
    }

    public function compraSemProduto()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [



                // Compra
                'parcelas' =>  trim($formulario['parcelas']),
                'fornecedor' => trim($formulario['fornecedor']),
                'funcionario' => trim($formulario['funcionario']),

                // Produto
                'categoria' => trim($formulario['categoria']),
                'nome_produto' => trim($formulario['nome_produto']),

                // item_compra
                'ipi' => trim($formulario['ipi']),
                'frete' => trim($formulario['frete']),
                'icms' => trim($formulario['icms']),
                'preco_compra' => trim($formulario['preco_compra']),
                'quantidade' => trim($formulario['quantidade']),

                // Erro
                "nome_fornecedor_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',

                // Compra
                'parcelas_erro' =>  '',
                'fornecedor_erro' => '',
                'funcionario_erro' => '',

                // Produto
                'nome_produto_erro' => '',

                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'preco_compra_erro' => '',
                'qunatidade_erro' => '',

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['categoria'])) :
                    $dados['categoria_erro'] = "Preencha o campo ";
                endif;

                if (empty($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['fornecedor'])) :
                    $dados['fornecedor_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['funcionario'])) :
                    $dados['funcionario_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['frete'])) :
                    $dados['frete_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['icms'])) :
                    $dados['icms_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Preencha o campo";
                endif;

            else :
                if (Validar::validarCampoNumerico($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoString($formulario['nome_produto'])) :
                    $dados['nome_produto_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['frete'])) :
                    $dados['frete_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['icms'])) :
                    $dados['icms_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Formato informado <b>invalido</b>";

                else :
                    if ($this->compraModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidCompra = $this->compraModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    ////////////////////////////////////////

                    if ($this->produtoModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidProduto = $this->produtoModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->itemCompraModel->insert($dados, $ultimoidProduto, $ultimoidCompra)) :
                        echo 'Cadastro realizado como sucesso <hr>';


                    else :
                        die("Erro");

                    endif;

                endif;
            endif;
            // var_dump($formulario);
            echo '<hr>';
        else :
            $dados = [
                // Compra
                'parcelas' =>  '',
                'fornecedor' => '',
                'funcionario' => '',

                // Produto
                'nome_produto' => '',

                // item_compra
                'ipi' => '',
                'frete' => '',
                'icms' => '',
                'preco_compra' => '',

                // Erro
                "nome_fornecedor_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',

                // Compra
                'parcelas_erro' =>  '',

                // Produto
                'nome_produto_erro' => '',

                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'preco_compra_erro' => '',
            ];
        endif;
        $this->view('compra/cadastarComprasSemProduto', $dados);
    }

    public function cadastrarCompra()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                // Compra
                'funcionario' => trim($formulario['funcionario']),
                'parcelas' => trim($formulario['parcelas']),

                // Produto

                'produto' => trim($formulario['produto']),
                // item_compra
                'ipi' => trim($formulario['ipi']),
                'frete' => trim($formulario['frete']),
                'icms' => trim($formulario['icms']),
                'quantidade' => trim($formulario['quantidade']),
                'preco_compra' => trim($formulario['preco_compra']),

                // Erro
                // Compra
                'funcionario_erro' => '',
                'parcelas_erro' => '',

                // Produto

                'produto_erro' => '',
                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'quantidade_erro' => '',
                'preco_compra_erro' => '',


            ];
            if (in_array("", $formulario)) :
                if (empty($formulario['funcionario'])) :
                    $dados['funcionario_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['produto'])) :
                    $dados['produto_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['frete'])) :
                    $dados['frete_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['icms'])) :
                    $dados['icms_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['quantidade'])) :
                    $dados['quantidade_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Preencha o campo";
                endif;
            else :
                if (Validar::validarCampoNumerico($formulario['funcionario'])) :
                    $dados['funcionario_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['produto'])) :
                    $dados['produto_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['frete'])) :
                    $dados['frete_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['icms'])) :
                    $dados['icms_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['preco_compra'])) :
                    $dados['preco_compra_erro'] = "Formato informado <b>invalido</b>";

                else :
                    foreach ($this->fornecedorModel->fornecedorPorProduto($dados['produto']) as $teste) :
                        $idFornecedorModel = $teste->id_fornecedor;
                        $nome = $teste->nome_fornecedor;
                    endforeach;

                    if ($this->compraModel->insertDois($dados, $idFornecedorModel)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidCompra = $this->compraModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->itemCompraModel->insertDois($dados, $ultimoidCompra)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;

                endif;
            endif;
            // var_dump($formulario);
        else :
            $dados = [
                // Compra
                'funcionario' => '',
                'parcelas' => '',

                // Produto

                'produto' => '',
                // item_compra
                'ipi' => '',
                'frete' => '',
                'icms' => '',
                'quantidade' => '',
                'preco_compra' => '',

                // Erro
                // Compra
                'funcionario_erro' => '',
                'parcelas_erro' => '',

                // Produto

                'produto_erro' => '',
                // item_compra
                'ipi_erro' => '',
                'frete_erro' => '',
                'icms_erro' => '',
                'quantidade_erro' => '',
                'preco_compra_erro' => '',
            ];
        endif;
        $this->view('compra/cadastarCompra');
    }
    public function visualizar($id)
    {
        $compra = $this->compraModel->selectById($id);
        $dados = [
            'comprasListar' => $compra
        ];

        $this->view('compra/visualizar', $dados);
    }
}
