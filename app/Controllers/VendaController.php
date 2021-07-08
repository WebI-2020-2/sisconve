<?php
class VendaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'UsuarioController/login');
        // URL::redirecionar('UsuarioController/login');
        endif;
        $this->vendaModel = $this->model('VendaModel');
        $this->itemVendaModel = $this->model('ItemVendaModel');
        $this->produtoModel = $this->model('ProdutoModel');
    }

    public function index()
    {
    }
    public function listarvenda()
    {
        $dados = [
            'vendas' => $this->vendaModel->selectAll()
        ];
        $this->view('venda/listarVenda', $dados);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';

        if (isset($formulario)) :
            $dados = [
                // item_venda
                'id_produto' => [],         // $formulario['id-produto'],
                'quantidade' => [],         // $formulario['quantidade-produto'],
                'valor_unitario' => [],     // $formulario['valor-unitario'],

                // venda
                'id_cliente' => (int) $formulario['cliente'],
                'num_parcelas' => (int) $formulario['num-parcelas'],
                'metodo_pagamento' => (int) $formulario['metodo-pagamento'],

                'quantidade_erro' => '',
                'valor_unitario_erro' => '',
                'num_parcelas_erro' => ''
            ];

            for ($i = 0; $i < count($formulario['id-produto']); $i++) :
                $dados['id_produto'][$i]     = (int) $formulario['id-produto'][$i];
                $dados['quantidade'][$i]     = (int) $formulario['quantidade-produto'][$i];
                $dados['valor_unitario'][$i] = (float) $formulario['valor-unitario'][$i];
            endfor;

            if (in_array("", $formulario)) :

                if (empty($formulario['quantidade'])) :
                    $dados['quantidade_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['valor_unitario'])) :
                    $dados['valor_unitario_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['num_parcelas'])) :
                    $dados['num_parcelas_erro'] = "Preencha o campo";
                endif;
            else :
                // if (Validar::validarCampoNumerico($formulario['quantidade-produto'])) :
                //   $dados['quantidade_erro'] = "Formato informado é <b>invalido</b>";

                // elseif ($this->produtoModel->validarQuantidade($formulario['quantidade-produto'])) :
                //    $dados['quantidade_erro'] = "Quantidade <b>acima</b> do estoque";

                // elseif (Validar::validarCampoNumerico($formulario['valor_unitario'])) :
                //    $dados['valor_unitario_erro'] = "Formato informado é <b>invalido</b>";

                // elseif (Validar::validarCampoNumerico($formulario['num_parcelas'])) :
                //    $dados['num_parcelas_erro'] = "Formato informado é <b>invalido</b>";
                // else :
                    if ($this->vendaModel->insert($dados)) :
                        $ultimoId = $this->vendaModel->getUltimoId();
                        //echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;

                    if ($this->itemVendaModel->insert($dados, $ultimoId)) :
                        //echo 'Cadastro realizado como sucesso <hr>';
                        Sessao::mensagem('venda', 'Venda realizada com sucesso!'.$imgSuccess, 'bg-green');
                        header("Location:".URL.DIRECTORY_SEPARATOR.'VendaController/cadastrar');
                        // URL::redirecionar('VendaController/cadastrar');

                    else :
                        die("Erro");

                    endif;
                //endif;
            endif;
            //var_dump($formulario);
        else :
            $dados = [
                'quantidade' => '',
                'valor_unitario' => '',
                'num_parcelas' => '',

                'quantidade_erro' => '',
                'valor_unitario_erro' => '',
                'num_parcelas_erro' => ''
            ];
        endif;
        $this->view('venda/cadastrarVenda');
    }
}
