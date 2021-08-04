<?php
class FuncionarioController extends Controller
{
    public function __construct()
    {

        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        $this->funcionarioModel = $this->model('FuncionarioModel');
    }


    public function cadastrar()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            if (isset($formulario['usuario'])) :
                $dados = [
                    'nome_funcionario' => trim($formulario['nome_funcionario']),
                    'telefone' => trim($formulario['telefone']),
                    'cpf' => trim($formulario['cpf']),
                    'endereco' => trim($formulario['endereco']),
                    'cargo' => trim($formulario['cargo']),
                    'salario' => trim($formulario['salario']),

                    'usuario' => trim($formulario['usuario']),
                    'senha' => trim($formulario['senha']),
                    'senha' => trim($formulario['confirma_senha']),
                    'email' => trim($formulario['email']),

                    'nivel_acesso' => trim($formulario['acess-level']),

                    'nome_funcionario_erro',
                    'telefone_erro' => '',
                    'cpf_erro' => '',
                    'endereco_erro' => '',
                    'cargo_erro' => '',
                    'salario_erro' => '',

                    'usuario_erro' => '',
                    'senha_erro' => '',
                    'email_erro' => '',
                    'confirma_senha_erro' => '',
                ];
                if (in_array("", $formulario)) :

                    if (empty($formulario['nome_funcionario'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Nome do Funcionario!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Telefone!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos CPF!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['endereco'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Endereço!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['cargo'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Cargo!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['salario'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Salario!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;


                    if (empty($formulario['usuario'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Usuario!!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['email'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Email!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['senha'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Senha!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;
                    if (empty($formulario['confirma_senha'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Comfirma Senha!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                else :
                    if (Validar::validarCampoString($formulario['nome_funcionario'])) :
                        Sessao::mensagem('funcionario', 'Formato em Nome do funcionario informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'Formato em CPF informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Formato em Telefone informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (strlen($formulario['telefone']) != 11) :
                        Sessao::mensagem('funcionario', 'Tamanho de Telefone tenha que ser 11 numeros!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoCPF($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'CPf invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['salario'])) :
                        Sessao::mensagem('funcionario', 'Formato em Salario informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoString($formulario['cargo'])) :
                        Sessao::mensagem('funcionario', 'Formato em Cargo informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($this->funcionarioModel->validarCpf($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'CPf invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($this->funcionarioModel->validarTelefone($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Telefone invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoEmail($formulario['email'])) :
                        Sessao::mensagem('funcionario', 'Email invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (strlen($formulario['senha']) < 6) :
                        Sessao::mensagem('funcionario', 'A senha deve ter no minimo 6 caracteres!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($formulario['senha'] != $formulario['confirma_senha']) :
                        Sessao::mensagem('funcionario', 'As senhas são diferentes!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($this->funcionarioModel->validarUsuario($formulario['usuario'])) :
                        Sessao::mensagem('funcionario', 'Usúario indisponivel!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    else :
                        $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);
                        if ($this->funcionarioModel->insertDois($dados)) :
                            Sessao::mensagem('funcionario', 'Cadastro realizado como sucesso!', 'bg-red');
                            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        else :
                            die("Erro");
                        endif;
                    endif;
                endif;
            else :
                // Sem acesso ao sistema
                $dados = [
                    'nome_funcionario' => trim($formulario['nome_funcionario']),
                    'telefone' => trim($formulario['telefone']),
                    'cpf' => trim($formulario['cpf']),
                    'endereco' => trim($formulario['endereco']),
                    'cargo' => trim($formulario['cargo']),
                    'salario' => trim($formulario['salario']),
                    'email' => trim($formulario['email']),

                    'nome_funcionario_erro',
                    'telefone_erro' => '',
                    'cpf_erro' => '',
                    'endereco_erro' => '',
                    'cargo_erro' => '',
                    'salario_erro' => '',

                    'usuario_erro' => '',
                    'senha_erro' => '',
                    'email_erro' => '',
                ];
                if (in_array("", $formulario)) :

                    if (empty($formulario['nome_funcionario'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Nome do Funcionario!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        $dados['nome_funcionario_erro'] = 'Preencha o campo';
                    endif;

                    if (empty($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Telefone!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        $dados['telefone_erro'] = 'Preencha o campo';
                    endif;

                    if (empty($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos CPF!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        $dados['cpf_erro'] = 'Preencha o campo';
                    endif;

                    if (empty($formulario['endereco'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Endereço!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['cargo'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Cargo!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['salario'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Salario!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                    endif;

                    if (empty($formulario['email'])) :
                        Sessao::mensagem('funcionario', 'Preencha os campos Email!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        $dados['email_erro'] = 'Preencha o campo';
                    endif;

                else :
                    if (Validar::validarCampoString($formulario['nome_funcionario'])) :
                        Sessao::mensagem('funcionario', 'Formato em Nome do funcionario informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'Formato em CPF informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Formato em Telefone informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoCPF($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'CPf invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoNumerico($formulario['salario'])) :
                        Sessao::mensagem('funcionario', 'Formato em Salario informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoString($formulario['cargo'])) :
                        Sessao::mensagem('funcionario', 'Formato em Cargo informado!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($this->funcionarioModel->validarCpf($formulario['cpf'])) :
                        Sessao::mensagem('funcionario', 'CPf invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif ($this->funcionarioModel->validarTelefone($formulario['telefone'])) :
                        Sessao::mensagem('funcionario', 'Telefone invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    elseif (Validar::validarCampoEmail($formulario['email'])) :
                        Sessao::mensagem('funcionario', 'Email invalido!', 'bg-red');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');

                    else :
                        if ($this->funcionarioModel->insert($dados)) :
                            Sessao::mensagem('funcionario', 'Cadastro realizado como sucesso!', 'bg-red');
                            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
                        else :
                            die("Erro");
                        endif;
                    endif;
                endif;

            endif;
        endif;
        $this->viewModal('modal/cadastrar-funcionario-modal');
    }

    public function login()
    {

        if (Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'DashboardController/dashboard');
        // URL::redirecionar('CategoriaController/listarCategoria');
        endif;


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            if (in_array("", $formulario)) :
                if (empty($formulario['usuario'])) :
                    Sessao::mensagem('funcionario', 'Preencha o campo usuario', 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
                endif;
                if (empty($formulario['senha'])) :
                    Sessao::mensagem('funcionario', 'Preencha o campo senha', 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
                endif;
            else :
                if (Validar::validarCampoString($formulario['usuario'])) :
                    Sessao::mensagem('funcionario', 'Formato informado em usuario incorreto', 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
                else :
                    $usuario = $this->funcionarioModel->login($formulario['usuario'], $formulario['senha']);

                    if ($usuario) :
                        $this->sesaoFuncionario($usuario);
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'DashboardController/dashboard');
                    else :
                        echo '
                        <script>
                            {
                                alert("Usuario ou senha incorretos!");
                            }
                        </script>';
                        Sessao::mensagem('funcionario', 'Usuario ou senha incorretos', 'bg-red');
                        // header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
                    endif;
                endif;
            endif;
        endif;

        $this->view('funcionario/login');
    }


    private function sesaoFuncionario($login)
    {
        $_SESSION["FUNCIONARIO_ID"] = $login->id_funcionario;
        $_SESSION["FUNCIONARIO_NOME_COMPLETO"] = $login->nome_funcionario;

        $_SESSION["FUNCIONARIO_CPF"] = $login->cpf;
        $_SESSION["FUNCIONARIO_TELEFONE"] = $login->telefone;
        $_SESSION["FUNCIONARIO_ENDERECO"] = $login->endereco;
        $_SESSION["FUNCIONARIO_CARGO"] = $login->cargo;
        $_SESSION["FUNCIONARIO_SALARIO"] = $login->salario;
        $_SESSION["FUNCIONARIO_NIVEL_ACESSO"] = $login->nivel_acesso;

        $_SESSION["FUNCIONARIO_USER"] = $login->usuario;
        $_SESSION["FUNCIONARIO_EMAIL"] = $login->email;
        $_SESSION["FUNCIONARIO_STATUS"] = $login->ativo;
        $_SESSION["FUNCIONARIO_DATA_CRIACAO"] = $login->criado_em;
    }

    public function sair()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;

        unset($_SESSION["FUNCIONARIO_ID"]);
        unset($_SESSION["FUNCIONARIO_NOME_COMPLETO"]);
        unset($_SESSION["FUNCIONARIO_USER"]);
        unset($_SESSION["FUNCIONARIO_EMAIL"]);
        unset($_SESSION["FUNCIONARIO_STATUS"]);
        unset($_SESSION["FUNCIONARIO_DATA_CRIACAO"]);

        unset($_SESSION["FUNCIONARIO_CPF"]);
        unset($_SESSION["FUNCIONARIO_TELEFONE"]);

        session_destroy();

        header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
    }

    public function listarFuncionario()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');

        endif;

        $dados = [
            'funcionarios' => $this->funcionarioModel->selectTodos()
        ];

        $this->view('funcionario/listarFuncionario', $dados);
    }
    public function deletar($id)
    {
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        $idInt = (int) $id;
        if (is_int($idInt)) :
            if ($this->funcionarioModel->deletar($idInt)) :
                Sessao::mensagem('funcionario', 'Funcionario apagado com sucesso!' . $imgSuccess, 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/listarFuncionario');
            else :
                Sessao::mensagem('funcionario', 'Erro!', 'bg-red');
            endif;
        endif;
    }
}
