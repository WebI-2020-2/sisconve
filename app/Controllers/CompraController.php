<?php
class CompraController extends Controller
{
    public function __construct()
    {
        $this->compraModel = $this->model('CompraModel');
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

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'funcionario_id' => trim($formulario['funcionario_id']),
                'fornecedor_id' => trim($formulario['fornecedor_id']),
                'parcelas' =>  trim($formulario['parcelas']),

                'funcionario_id_erro' => '',
                'fornecedor_id_erro' => '',
                'parcelas_erro' =>  '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Preencha o campo";
                endif;
            else :
                if (Validar::validarCampoNumerico($formulario['parcelas'])) :
                    $dados['parcelas_erro'] = "Formato informado <b>invalido</b>";
                else :

                    if ($this->compraModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            var_dump($formulario);
        else :
            $dados = [
                'funcionario_id' => '',
                'fornecedor_id' => '',
                'parcelas' =>  '',

                'funcionario_id_erro' => '',
                'fornecedor_id_erro' => '',
                'parcelas_erro' =>  '',
            ];
        endif;
        $this->view('compra/cadastarCompras', $dados);
    }
}
