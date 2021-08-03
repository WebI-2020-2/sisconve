<?php
class EnderecoController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->enderecoModel = $this->model('EnderecoModel');
    }

    public function index()
    {
    }
    public function listarCompras()
    {
        $dados = [
            'enderecos' => $this->enderecoModel->selectAll()
        ];
        $this->view('endereco/listarEnderecos', $dados);
    }


    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'cliente_id' => trim($formulario['cliente_id']),
                'rua' => trim($formulario['rua']),
                'bairro' => trim($formulario['bairro']),
                'cidade' => trim($formulario['cidade']),
                'estado' => trim($formulario['estado']),
                'numero' => trim($formulario['numero']),

                'cliente_id_erro' => '',
                'rua_erro' => '',
                'bairro_erro' => '',
                'cidade_erro' => '',
                'estado_erro' => '',
                'numero_erro' => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['cliente_id'])) :
                    $dados['cliente_id_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['rua'])) :
                    $dados['rua_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['bairro'])) :
                    $dados['bairro_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['cidade'])) :
                    $dados['cidade_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['estado'])) :
                    $dados['estado_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['numero'])) :
                    $dados['numero_erro'] = "Preencha o campo";
                endif;
            else :
                if (Validar::validarCampoString($formulario['rua'])) :
                    $dados['rua_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['bairro'])) :
                    $dados['bairro_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['cidade'])) :
                    $dados['cidade_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['estado'])) :
                    $dados['estado_erro'] = "Formato invalido";

                elseif (Validar::validarCampoNumerico($formulario['numero'])) :
                    $dados['numero_erro'] = "Formato invalido";
                    
                else :
                    if ($this->enderecoModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
        else :
            $dados = [
                'cliente_id' => '',
                'rua' => '',
                'bairro' => '',
                'cidade' => '',
                'estado' => '',
                'numero' => '',

                'cliente_id_erro' => '',
                'rua_erro' => '',
                'bairro_erro' => '',
                'cidade_erro' => '',
                'estado_erro' => '',
                'numero_erro' => '',

            ];
        endif;

        $this->view('endereco/CadastarEndereco', $dados);
    }
}
