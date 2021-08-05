<?php
class CompraController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'fornecedorController/login');
        // URL::redirecionar('fornecedorController/login');
        endif;
        $this->compraModel = $this->model('CompraModel');
        $this->produtoModel = $this->model('ProdutoModel');
        $this->fornecedorModel = $this->model('FornecedorModel');
        $this->itemCompraModel = $this->model('ItemCompraModel');
        $this->pagamentoCompraModel = $this->model('PagamentoCompraModel');
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

    public function cadastrarCompra()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                // funcionario
                'funcionario' =>  $_SESSION["FUNCIONARIO_ID"],

                // fornecedor
                'fornecedor' => (int) $formulario['fornecedor'],

                // Produto
                'id-produto' => [], // $formulario['id-produto'],

                //pagamento venda
                'metodo_pagamento' => (int) $formulario['metodo-pagamento'],

                // item_compra
                'ipi' => [],                                            // $formulario['ipi'],
                'frete' => [],                                          // $formulario['frete'],
                'icms' => [],                                           // $formulario['icms'],
                'quantidade-produto' => [],                             // $formulario['quantidade-produto'],
                'valor-unitario' => [],                                 // $formulario['valor-produto'],
                'num-parcelas' => (int) $formulario['num-parcelas'],    // $formulario['num-parcelas'],

                // Erro
                // Compra
                'fornecedor_erro' => '',
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

            for ($i = 0; $i < count($formulario['id-produto']); $i++) :
                $dados['id-produto'][$i] = (int) $formulario['id-produto'][$i];
                $dados['ipi'][$i] = (float) $formulario['ipi'][$i];
                $dados['frete'][$i] = (float) $formulario['frete'][$i];
                $dados['icms'][$i] = (float) $formulario['icms'][$i];
                $dados['quantidade-produto'][$i] = (int) $formulario['quantidade-produto'][$i];
                $dados['valor-unitario'][$i] = (float) $formulario['valor-unitario'][$i];
            endfor;

            if (in_array("", $formulario)) :
                if (empty($formulario['fornecedor'])) :
                    $dados['fornecedor_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['num-parcelas'])) :
                    $dados['parcelas_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['id-produto'])) :
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

                if (empty($formulario['valor-unitario'])) :
                    $dados['preco_compra_erro'] = "Preencha o campo";
                endif;
            else :
                if (Validar::validarCampoNumerico($formulario['fornecedor'])) :
                    $dados['fornecedor_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['num-parcelas'])) :
                    $dados['parcelas_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['id-produto'])) :
                    $dados['produto_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['ipi'])) :
                    $dados['ipi_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['frete'])) :
                    $dados['frete_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['icms'])) :
                    $dados['icms_erro'] = "Formato informado <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['valor-unitario'])) :
                    $dados['preco_compra_erro'] = "Formato informado <b>invalido</b>";

                else :

                    if ($this->compraModel->insertDois($dados)) :
                        // echo 'Cadastro realizado como sucesso <hr>';
                        $ultimoidCompra = $this->compraModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->itemCompraModel->insertDois($dados, $ultimoidCompra)) :
                        // echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                    if ($this->pagamentoCompraModel->insert($dados, $ultimoidCompra)) :
                        // echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                    echo 'chego<hr>';

                endif;
            endif;
            var_dump($formulario);
        else :
            $dados = [
                // Compra
                'fornecedor' => '',
                'num-parcelas' => '',

                // Produto

                'id-produto' => '',
                // item_compra
                'ipi' => '',
                'frete' => '',
                'icms' => '',
                'quantidade' => '',
                'valor-unitario' => '',

                // Erro
                // Compra
                'fornecedor_erro' => '',
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
