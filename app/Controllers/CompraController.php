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
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        if (isset($formulario)) :
            $dados = [
                // funcionario
                'funcionario' =>  $_SESSION["FUNCIONARIO_ID"],

                // fornecedor
                'fornecedor' => (int) $formulario['fornecedor'],

                // Produto
                'id-produto' => [], // $formulario['id-produto'],

                //pagamento compra
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
                    echo "aaaaa";
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['num-parcelas'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['id-produto'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['ipi'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['frete'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['icms'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['quantidade'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;

                if (empty($formulario['valor-unitario'])) :
                    Sessao::mensagem('compra', 'Preencha o Campo' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                endif;
            else :
                if (Validar::validarCampoNumerico($formulario['fornecedor'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['num-parcelas'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['id-produto'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['ipi'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['frete'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['icms'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                elseif (Validar::validarCampoNumerico($formulario['valor-unitario'])) :
                    Sessao::mensagem('compra', 'Formato informado invalido' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');

                else :

                    if ($this->compraModel->insertDois($dados)) :
                        Sessao::mensagem('compra', 'Compra realizada com sucesso!' . $imgSuccess, 'bg-green');
                        $ultimoidCompra = $this->compraModel->getUltimoId();
                    else :
                        die("Erro");

                    endif;

                    if ($this->itemCompraModel->insertDois($dados, $ultimoidCompra)) :
                    else :
                        die("Erro");

                    endif;
                    if ($this->pagamentoCompraModel->insert($dados, $ultimoidCompra)) :
                        //Sessao::mensagem('compra', 'Compra realizada com sucesso!' . $imgSuccess, 'bg-green');
                        //header("Location:" . URL . DIRECTORY_SEPARATOR . 'CompraController/cadastrarCompra');
                    else :
                        die("Erro");
                    endif;
                endif;
            endif;
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
