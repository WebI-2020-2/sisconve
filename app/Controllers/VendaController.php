<?php
class VendaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->vendaModel = $this->model('VendaModel');
        $this->itemVendaModel = $this->model('ItemVendaModel');
        $this->produtoModel = $this->model('ProdutoModel');
        $this->pagamentoVendaModel = $this->model('PagamentoVendaModel');
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
                if ($this->vendaModel->insert($dados)) :
                    $ultimoId = $this->vendaModel->getUltimoId();
                    Sessao::mensagem('venda', 'Venda realizada com sucesso!' . $imgSuccess, 'bg-green');
                else :
                    die("Erro");

                endif;

                if ($this->itemVendaModel->insert($dados, $ultimoId)) :
                    
                else :
                    die("Erro");

                endif;
                $valor_total = $this->vendaModel->valorTotal($ultimoId);
                
                if ($this->pagamentoVendaModel->insert($ultimoId, $dados, $valor_total)) :
                else :
                    die("Erro");
                endif;

            endif;
        // var_dump($formulario);
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
    public function deletar($id)
    {
        $idInt = (int) $id;
        if (is_int($idInt)) :
            if ($this->vendaModel->deletar($idInt)) :
                Sessao::mensagem('venda', 'Venda apagada com sucesso!', 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'VendaController/listarvenda');
            else :
                Sessao::mensagem('venda', 'Erro!', 'bg-red');
            endif;
        endif;
    }
}
