<?php

class clienteController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->clienteModel = $this->model('ClienteModel');
        $this->enderecoModel = $this->model('EnderecoModel');
        $this->telefoneModel = $this->model('TelefoneModel');
    }
    public function listarcliente()
    {
        $dados = [
            'cliente' => $this->clienteModel->selectAllToSell()
            // 'telefones' => $this->telefoneModel->selectAll(),

        ];

        $this->view('cliente/listarcliente', $dados);
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
                    Sessao::mensagem('cliente', 'Preencha o campo <b>nome</b>!', 'bg-red');
                    // $dados['nome_erro'] = "Preencha o campo <b>nome</b>";
                endif;

                if (empty($formulario['cpf'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>CPF</b>!', 'bg-red');
                    $dados['cpf_erro'] = "Preencha o campo <b>CPF</b>";
                endif;

                if (empty($formulario['num_telefone'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Numero de Telefone</b>!', 'bg-red');

                    $dados['num_telefone_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ddd'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>DDD</b>!', 'bg-red');

                    $dados['ddd_erro'] = "Preencha o campo";
                endif;

                // if (empty($formulario['cliente_id'])) :
                //     Sessao::mensagem('cliente', 'Preencha o campo <b>CPF</b>!', 'bg-red');

                //     $dados['cliente_id_erro'] = "Preencha o campo";
                // endif;

                // if (empty($formulario['cliente_id'])) :
                    
                //     $dados['cliente_id_erro'] = "Preencha o campo";
                // endif;

                if (empty($formulario['rua'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Rua</b>!', 'bg-red');

                    $dados['rua_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['bairro'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Bairro</b>!', 'bg-red');

                    $dados['bairro_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['cidade'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Cidade</b>!', 'bg-red');
                    $dados['cidade_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['estado'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Estado</b>!', 'bg-red');
                    $dados['estado_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['numero'])) :
                    Sessao::mensagem('cliente', 'Preencha o campo <b>Número</b>!', 'bg-red');
                    $dados['numero_erro'] = "Preencha o campo";
                endif;

            else :
                if (Validar::validarCampoString($formulario['nome'])) :
                    Sessao::mensagem('cliente', 'Formato de nome informado <b>invalido</b>!', 'bg-red');
                    $dados['nome_erro'] = "Nome informado é <b>invalido</b>";

                elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
                    Sessao::mensagem('cliente', 'Formato de CPF informado <b>invalido</b>!', 'bg-red');
                    $dados['cpf_erro'] = "CPF informado é <b>invalido</b>";

                elseif ($this->clienteModel->VerificarCpf($formulario['cpf'])) :
                    Sessao::mensagem('cliente', 'Usuario já <b>cadastrado</b>!', 'bg-red');
                    $dados['cpf_erro'] = "Usuario já <b>cadastrado</b>";

                elseif (Validar::validarCampoString($formulario['rua'])) :
                    Sessao::mensagem('cliente', 'Formato de Rua informado <b>invalido</b>!', 'bg-red');
                    $dados['rua_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['bairro'])) :
                    Sessao::mensagem('cliente', 'Formato de Bairro informado <b>invalido</b>!', 'bg-red');
                    $dados['bairro_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['cidade'])) :
                    Sessao::mensagem('cliente', 'Formato de Cidade informado <b>invalido</b>!', 'bg-red');
                    $dados['cidade_erro'] = "Formato invalido";

                elseif (Validar::validarCampoString($formulario['estado'])) :
                    Sessao::mensagem('cliente', 'Formato de Estado informado <b>invalido</b>!', 'bg-red');
                    $dados['estado_erro'] = "Formato invalido";

                // elseif (Validar::validarCampoNumerico($formulario['numero'])) :
                //    $dados['numero_erro'] = "Formato invalido";

                elseif (Validar::validarCampoNumerico($formulario['num_telefone'])) :
                    Sessao::mensagem('cliente', 'Formato de Numero de Telefone informado <b>invalido</b>!', 'bg-red');
                    $dados['num_telefone_erro'] = "Formato invalido";
                
                elseif (Validar::validarCampoTelefone($formulario['num_telefone'])):
                    Sessao::mensagem('cliente', 'Formato de Numero de Telefone informado <b>invalido</b>!', 'bg-red');
                    $dados['num_telefone_erro'] = "O tanho do campo tenha que ser 9 digitos";

                elseif (Validar::validarCampoNumerico($formulario['ddd'])) :
                    Sessao::mensagem('cliente', 'Formato de DDD informado <b>invalido</b>!', 'bg-red');
                    $dados['ddd_erro'] = "Formato invalido";

                else :
                    if ($this->clienteModel->insert($dados)) :
                        $ultimoid = $this->clienteModel->getUltimoId();
                    else :
                        die("Erro");
                    endif;

                    if ($this->enderecoModel->insert($dados, $ultimoid) && $this->telefoneModel->insert($dados, $ultimoid)) :
                        Sessao::mensagem('cliente', 'Cadastro realizado com sucesso!', 'bg-green');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
                    // URL::redirecionar('FuncionarioController/login');
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
        // $this->view('cliente/cadastracliente', $dados);
    }
    public function visualizar($id)
    {
        $cliente = $this->clienteModel->selectById($id);
        $dados = [
            'clienteListar' => $cliente
        ];

        $this->view('cliente/visualizar', $dados);
    }

    public function deletar($id)
    {
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        $idInt = (int) $id;
        if (is_int($idInt)) :
            if ($this->clienteModel->deletar($idInt)) :
                Sessao::mensagem('cliente', 'Cliente apagado com sucesso!'. $imgSuccess, 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
            else :
                Sessao::mensagem('cliente', 'Erro!', 'bg-red');
            endif;
        endif;
    }

    public function update()
    {

        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = [
            // Cliente
            'id_cliente' => trim($formulario['id_cliente']),
            'nome' => trim($formulario['nome']),
            'cpf' => trim($formulario['cpf']),
            // Telefone
            'ddd' => trim($formulario['ddd']),
            'num_telefone' => trim($formulario['num_telefone']),
            // Endereço
            'rua' => trim($formulario['rua']),
            'numero' => trim($formulario['numero']),
            'bairro' => trim($formulario['bairro']),
            'cidade' => trim($formulario['cidade']),
            'estado' => trim($formulario['estado']),

            // Erro
            // Cliente
            'nome_erro',
            'cpf_erro',
            // Telefone
            'ddd_erro',
            'num_telefone_erro',
            // Endereço
            'rua_erro',
            'numero_erro',
            'bairro_erro',
            'cidade_erro',
            'estado_erro',
        ];
        if (Validar::validarCampoString($formulario['nome'])) :
            Sessao::mensagem('cliente', 'Nome informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
            Sessao::mensagem('cliente', 'CPF informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoString($formulario['rua'])) :
            Sessao::mensagem('cliente', 'Rua informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoString($formulario['bairro'])) :
            Sessao::mensagem('cliente', 'Bairro informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoString($formulario['cidade'])) :
            Sessao::mensagem('cliente', 'Cidade informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoString($formulario['estado'])) :
            Sessao::mensagem('cliente', 'Estado informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoNumerico($formulario['num_telefone'])) :
            Sessao::mensagem('cliente', 'Telefone informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');

        elseif (Validar::validarCampoNumerico($formulario['ddd'])) :
            Sessao::mensagem('cliente', 'DDD informado é invalido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
        // URL::redirecionar('clienteController/listarcliente');
        else :
            $idInt = (int)$dados['id_cliente'];
            if ($this->clienteModel->update($dados, $idInt)) :

            else :
                die("Erro");
            endif;

            if ($this->enderecoModel->update($dados, $idInt) && $this->telefoneModel->update($dados, $idInt)) :
                Sessao::mensagem('cliente', 'Cliente atuazado com sucesso!' .$imgSuccess, 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'clienteController/listarcliente');
            // URL::redirecionar('FuncionarioController/login');
            else :
                die("Erro");
            endif;
        endif;
        $this->viewModal('modal/editar-cliente-modal');
    }
}
