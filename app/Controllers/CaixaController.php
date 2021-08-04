<?php
class CaixaController extends Controller
{
    public function __construct()
    {

        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->caixaModel = $this->model('CaixaModel');
        

    }
    public function listarCaixa()
    {
        $dados = [
            'caixas' => $this->caixaModel->selectAll()
        ];
        $this->view('caixa/listarCaixas', $dados);
    }

    public function cadastrar()
    {
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'valor_em_caixa' => trim($formulario['valor_em_caixa']),
                'id_funcionario' => trim($formulario['id_funcionario']),
                'valor_em_caixa_erro' => '',
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['valor_em_caixa'])) :
                    Sessao::mensagem('caixa', 'Preencha o campo valor em caixa!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixas');
                endif;

                if (empty($formulario['id_funcionario'])) :
                    Sessao::mensagem('caixa', 'Preencha o campo Funcionario!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixas');
                endif;

            else:
                if (Validar::validarCampoNumerico($formulario['valor_em_caixa'])) :
                    Sessao::mensagem('caixa', 'Formato informado Invalido!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixas');
                else:
                    if ($this->caixaModel->insert($dados)) :
                        Sessao::mensagem('caixa', 'Caixa Cadastrado com sucesso!' . $this->$imgSuccess, 'bg-green');

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            // var_dump($formulario);
        else:
            $dados = [
                'valor_em_caixa' => '',

                'valor_em_caixa_erro' => '',
            ];
        endif;


        $this->view('caixa/cadastrarCaixa', $dados);
    }
}
