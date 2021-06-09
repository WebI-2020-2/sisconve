<?php

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('FuncionarioModel');
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'nome_funcionario' => trim($formulario['nome_funcionario']),
                'telefone' => trim($formulario['telefone']),
                'cpf' => trim($formulario['cpf']),
                'endereco' => trim($formulario['endereco']),
                'cargo' => trim($formulario['cargo']),
                'salario' => trim($formulario['salario']),

                'nome_funcionario_erro',
                'telefone_erro' => '',
                'cpf_erro' => '',
                'endereco_erro' => '',
                'cargo_erro' => '',
                'salario_erro' => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome_funcionario'])) :
                    $dados['nome_funcionario_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['telefone'])) :
                    $dados['telefone_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['cpf'])) :
                    $dados['cpf_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['endereco'])) :
                    $dados['endereco_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['cargo'])) :
                    $dados['cargo_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['salario'])) :
                    $dados['salario_erro'] = 'Preencha o campo';
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome_funcionario'])) :
                    $dados['nome_funcionario_erro'] = "Nome informado inavlido";
                elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
                    $dados['cpf_erro'] = "Formato informado inavlido";
                elseif (Validar::validarCampoCPF($formulario['cpf'])) :
                    $dados['cpf_erro'] = "CPF informado inavlido";
                elseif (Validar::validarCampoNumerico($formulario['salario'])) :
                    $dados['salario_erro'] = "Formato informado inavlido";
                elseif (Validar::validarCampoString($formulario['cargo'])) :
                    $dados['cargo_erro'] = "Formato informado inavlido";
                else:
                    echo "Pode Cadastrar <hr>";
                endif;

            endif;
            var_dump($formulario);
        else :
            $dados = [
                'nome_funcionario' => '',
                'telefone' => '',
                'cpf' => '',
                'endereco' => '',
                'cargo' => '',
                'salario' => '',

                'nome_funcionario_erro',
                'telefone_erro' => '',
                'cpf_erro' => '',
                'endereco_erro' => '',
                'cargo_erro' => '',
                'salario_erro' => '',
            ];
        endif;

        $this->view('funcionario/cadastrarFuncionario', $dados);
    }
}
