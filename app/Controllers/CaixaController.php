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

    public function index()
    {
    }
    public function listarCaixa()
    {
        $dados = [
            'caixas' => $this->CaixaModel->selectAll()
        ];
        $this->view('caixa/listarCaixas', $dados);
    }

    public function cadastrar()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'valor_em_caixa' => trim($formulario['valor_em_caixa']),

                'valor_em_caixa_erro' => '',
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['valor_em_caixa'])) :
                    $dados['valor_em_caixa_erro'] = "Preencha o campo";
                endif;
            else:
                if (Validar::validarCampoNumerico($formulario['valor_em_caixa'])) :
                    $dados['valor_em_caixa_erro'] = "Nome informado é <b>invalido</b>";
                else:
                    if ($this->caixaModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            var_dump($formulario);
        else:
            $dados = [
                'valor_em_caixa' => '',

                'valor_em_caixa_erro' => '',
            ];
        endif;


        $this->view('caixa/cadastrarCaixa', $dados);
    }
}
