<?php

class ClientesController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'UsuarioController/login');
            // URL::redirecionar('UsuarioController/login');
        endif;
        $this->clienteModel = $this->model('ClienteModel');
        $this->enderecoModel = $this->model('EnderecoModel');
        $this->telefoneModel = $this->model('TelefoneModel');
    }
    public function listarClientes()
    {
        $dados = [
            'clientes' => $this->clienteModel->selectAll()
            // 'telefones' => $this->telefoneModel->selectAll(),

        ];

        $this->view('clientes/listarClientes', $dados);
    }


    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'cpf' => trim($formulario['cpf']),
                'rua' => trim($formulario['rua']),

                'bairro' => trim($formulario['bairro']),
                'cidade' => trim($formulario['cidade']),
                'estado' => trim($formulario['estado']),
                'numero' => trim($formulario['numero']),

                'num_telefone' => trim($formulario['num_telefone']),
                'ddd' => trim($formulario['ddd']),

                'cliente_id_erro' => '',
                'rua_erro' => '',
                'bairro_erro' => '',
                'cidade_erro' => '',
                'estado_erro' => '',
                'numero_erro' => '',
                'name_erro' => '',
                'cpf_erro' => '',
                "cliente_id_erro" => '',
                'num_telefone_erro' => '',
                'ddd_erro' => '',
                'whatsapp_erro' => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = "Preencha o campo <b>nome</b>";
                endif;

                if (empty($formulario['cpf'])) :
                    $dados['cpf_erro'] = "Preencha o campo <b>CPF</b>";
                endif;

                if (empty($formulario['num_telefone'])) :
                    $dados['num_telefone_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ddd'])) :
                    $dados['ddd_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['cliente_id'])) :
                    $dados['cliente_id_erro'] = "Preencha o campo";
                endif;

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
                if (Validar::validarCampoString($formulario['nome'])) :
                    $dados['nome_erro'] = "Nome informado é <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['cpf'])) :

                    $dados['cpf_erro'] = "CPF informado é <b>invalido</b>";

                elseif ($this->clienteModel->VerificarCpf($formulario['cpf'])) :
                    $dados['cpf_erro'] = "Usuario já <b>cadastrado</b>";

                elseif (Validar::validarCampoString($formulario['rua'])) :
                    $dados['rua_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['bairro'])) :
                    $dados['bairro_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['cidade'])) :
                    $dados['cidade_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['estado'])) :
                    $dados['estado_erro'] = "Formato invalido";

                // elseif (Validar::validarCampoNumerico($formulario['numero'])) :
                //    $dados['numero_erro'] = "Formato invalido";

                elseif (Validar::validarCampoNumerico($formulario['num_telefone'])) :
                    $dados['num_telefone_erro'] = "Formato invalido";

                elseif (Validar::validarCampoNumerico($formulario['ddd'])) :
                    $dados['ddd_erro'] = "Formato invalido";

                else :
                    if ($this->clienteModel->insert($dados)) :
                        $ultimoid = $this->clienteModel->getUltimoId();
                    else :
                        die("Erro");
                    endif;

                    if ($this->enderecoModel->insert($dados, $ultimoid) && $this->telefoneModel->insert($dados, $ultimoid)) :
                        Sessao::mensagem('cliente','Usuario ou senha invalidos','alert alert-danger');
                        header("Location:".URL.DIRECTORY_SEPARATOR.'ClientesController/listarClientes');
                        // URL::redirecionar('UsuarioController/login');
                    else :
                        die("Erro");
                    endif;
                endif;

            endif;
        else :
            $dados = [
                'nome' => '',
                'cpf' => '',

                'cliente_id' => '',
                'rua' =>  '',
                'bairro' => '',
                'cidade' => '',
                'estado' => '',
                'numero' => '',

                "cliente_id" => '',
                'num_telefone' => '',
                'ddd' => '',

                'cliente_id_erro' => '',
                'rua_erro' => '',
                'bairro_erro' => '',
                'cidade_erro' => '',
                'estado_erro' => '',
                'numero_erro' => '',
                'name_erro' => '',
                'cpf_erro' => '',
                "cliente_id_erro" => '',
                'num_telefone_erro' => '',
                'ddd_erro' => '',
                'whatsapp_erro' => '',
            ];
        endif;
        $this->viewModal('modal/cadastrar-cliente-modal', $dados);
        // $this->view('clientes/cadastraClientes', $dados);
    }
}
