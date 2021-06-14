<?php

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('ClienteModel');

        
    }
    
    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'cpf' => trim($formulario['cpf']),

                'name_erro' => '',
                'cpf_erro' => '',
            ];
            if (in_array("", $formulario)) :
                
                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = "Preencha o campo nome";
                endif;

                if (empty($formulario['cpf'])) :
                    $dados['cpf_erro'] = "Preencha o campo CPF";
                endif;
            else:
                if(Validar::validarCampoString($formulario['nome'])):
                    $dados['nome_erro'] = "Nome informado é invalido";
                elseif(Validar::validarCampoNumerico($formulario['cpf'])):
                    $dados['cpf_erro'] = "CPF informado é invalido";
                elseif($this->usuarioModel->VerificarCpf($formulario['cpf'])):
                    $dados['cpf_erro'] = "Usuario já cadastrado";
                else:
                    if ($this->usuarioModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;

            endif; 
        else:
             $dados = [
                'nome' => '',
                'cpf' => '',

                'name_erro' => '',
                'cpf_erro' => '',
            ];
        endif;
        $this->view('clientes/cadastraClientes', $dados);
    }
}
