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
            $dados = [
                'nome_funcionario' => trim($formulario['nome_funcionario']),
                'telefone' => trim($formulario['telefone']),
                'cpf' => trim($formulario['cpf']),
                'endereco' => trim($formulario['endereco']),
                'cargo' => trim($formulario['cargo']),
                'salario' => trim($formulario['salario']),

                'usuario' => trim($formulario['usuario']),
                'senha' => trim($formulario['senha']),
                'email' => trim($formulario['email']),
                'caixa' => trim($formulario['caixa']),


                'nome_funcionario_erro',
                'telefone_erro' => '',
                'cpf_erro' => '',
                'endereco_erro' => '',
                'cargo_erro' => '',
                'salario_erro' => '',

                'usuario_erro' => '',
                'senha_erro' => '',
                'email_erro' => '',
                'caixa_errro' => '',
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

                if (empty($formulario['caixa'])) :
                    $dados['caixa_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['usuario'])) :
                    $dados['usuario_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo';
                endif;
                if (empty($formulario['confirma_senha'])) :
                    $dados['confirma_senha_erro'] = 'Confirme a Senha';
                endif;

            else :
                if (Validar::validarCampoString($formulario['nome_funcionario'])) :
                    $dados['nome_funcionario_erro'] = "Nome informado <b>inavlido</b>";

                elseif (Validar::validarCampoNumerico($formulario['cpf'])) :
                    $dados['cpf_erro'] = "Formato informado <b>inavlido</b>";

                elseif (Validar::validarCampoNumerico($formulario['telefone'])) :
                    $dados['telefone_erro'] = "Formato informado <b>inavlido</b>";

                elseif (Validar::validarCampoCPF($formulario['cpf'])) :
                    $dados['cpf_erro'] = "CPF informado <b>inavlido</b>";

                elseif (Validar::validarCampoNumerico($formulario['salario'])) :
                    $dados['salario_erro'] = "Formato informado <b>inavlido</b>";

                elseif (Validar::validarCampoString($formulario['cargo'])) :
                    $dados['cargo_erro'] = "Formato informado <b>inavlido</b>";

                elseif ($this->funcionarioModel->validarCpf($formulario['cpf'])) :
                    $dados['cpf_erro'] = "CPF informado <b>inavlido</b>";

                elseif ($this->funcionarioModel->validarTelefone($formulario['telefone'])) :
                    $dados['telefone_erro'] = "Telefone  informado <b>pertence</b> a outro funcionário";
                
                elseif (strlen($formulario['senha']) < 6) :
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres';
                
                elseif ($formulario['senha'] != $formulario['confirma_senha']) :
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                else :
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);
                    if ($this->funcionarioModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                    else :
                        die("Erro");
                    endif;
                endif;

            endif;
<<<<<<< HEAD
=======
            // var_dump($formulario);
>>>>>>> 6d32c9881e92a31b898e356aec41669a19e54102
        else :
            $dados = [
                'nome_funcionario' => '',
                'telefone' => '',
                'cpf' => '',
                'endereco' => '',
                'cargo' => '',
                'salario' => '',

                'usuario' => '',
                'senha' => '',
                'email' => '',
                'caixa' => '',

                'nome_funcionario_erro',
                'telefone_erro' => '',
                'cpf_erro' => '',
                'endereco_erro' => '',
                'cargo_erro' => '',
                'salario_erro' => '',

                'usuario_erro' => '',
                'senha_erro' => '',
                'email_erro' => '',
                'caixa_errro' => '',
            ];
        endif;

        $this->view('funcionario/cadastrarFuncionario', $dados);
    }

    public function login()
    {

        if (Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'DashboardController/dashboard');
        // URL::redirecionar('CategoriaController/listarCategoria');
        endif;


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [

                'usuario' => trim($formulario['usuario']),
                'senha' => trim($formulario['senha']),

                'usuario_erro' => '',
                'senha_erro' => '',

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Preencha o campo usuario";
                endif;


                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = "Preencha o campo senha";

                endif;

            else :
                if (Validar::validarCampoString($formulario['usuario'])) :
                    $dados['usuario_erro'] = "Usuario invalido";

                else :
                    $login = $this->funcionarioModel->login($formulario['usuario'], $formulario['senha']);
                    $this->sesaoFuncionario($login);
                    if ($login) :
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'DashboardController/dashboard');
                    // URL::redirecionar('CategoriaController/listarCategoria');
                    else :
                        Sessao::mensagem('funcionario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    endif;

                endif;
            endif;

        else :
            $dados = [

                'usuario' => '',
                'senha' => '',

                'usuario_erro' => '',
                'senha_erro' => '',
            ];

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
        // URL::redirecionar('FuncionarioController/login');
    }

    public function listarFuncionario()
    {

        if ($_SESSION["FUNCIONARIO_NIVEL_ACESSO"] == 2) :
            Sessao::mensagem('funcionario', 'Erro! Você não tem acesso!' . $this->imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'DashboardController/dashboard');
        // URL::redirecionar('CategoriaController/listarCategoria');
        endif;
<<<<<<< HEAD
        //var_dump($_SESSION["FUNCIONARIO_NIVEL_ACESSO"]);
=======
        // var_dump($_SESSION["FUNCIONARIO_NIVEL_ACESSO"]);
>>>>>>> 6d32c9881e92a31b898e356aec41669a19e54102
        $dados = [
            'funcionarios' => $this->funcionarioModel->selectAll()
        ];

        $this->view('funcionario/listarFuncionario', $dados);
    }
}
