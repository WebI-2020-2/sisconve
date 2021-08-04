<?php


class FornecedorController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->fornecedorModel = $this->model('FornecedorModel');
    }

    public function listarFornecedor()
    {
        $dados = [
            'fornecedores' => $this->fornecedorModel->selectAll()
        ];

        $this->view('fornecedor/listarFornecedor', $dados);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';

        if (isset($formulario)) :
            $dados = [
                "nome" =>  trim($formulario['nome-fornecedor']),
                "telefone" => trim($formulario['telefone-fornecedor']),
                "estado" => trim($formulario['estado-fornecedor']),
                "cidade" => trim($formulario['cidade-fornecedor']),

                "nome_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    Sessao::mensagem('Preencha o campo <b>Nome</b>!', 'bg-red');
                    $dados['nome_erro'] = "Preencha o campo <b>nome</b>";
                endif;

                if (empty($formulario['telefone'])) :
                    Sessao::mensagem('Preencha o campo <b>Nome</b>!', 'bg-red');
                    $dados['telefone_erro'] = "Preencha o campo <b>telefone</b>";
                endif;

                if (empty($formulario['estado'])) :
                    Sessao::mensagem('Preencha o campo <b>Estado</b>!', 'bg-red');
                    $dados['estado_erro'] = "Preencha o campo <b>estado</b>";
                endif;

                if (empty($formulario['cidade'])) :
                    Sessao::mensagem('Preencha o campo <b>Cidade</b>! ', 'bg-red');
                    $dados['cidade_erro'] = "Preencha o campo <b>cidade</b>";
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome-fornecedor'])) :
                    //$dados['nome_erro'] = "Nome informado é <b>invalido</b>";
                    Sessao::mensagem('fornecedor', 'Erro! O nome informado é inválido! ', 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoNumerico($formulario['telefone-fornecedor'])) :
                    //$dados['telefone_erro'] = "Telefone informado é <b>invalido</b>";
                    Sessao::mensagem('fornecedor', 'Erro! O telefone informado é inválido!'.$imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['estado-fornecedor'])) :
                    //$dados['estado_erro'] = "Estado informado é <b>invalido</b>";
                    Sessao::mensagem('fornecedor', 'Erro! O estado informado é inválido!'.$imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['cidade-fornecedor'])) :
                    //$dados['cidade_erro'] = "Cidade informado é <b>invalido</b>";
                    Sessao::mensagem('fornecedor', 'Erro! A cidade informada é inválida!'.$imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                else :
                    if ($this->fornecedorModel->insert($dados)) :
                        Sessao::mensagem('fornecedor', 'Cadastrado realizado com sucesso!'.$imgSuccess, 'bg-green');
                        header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            //var_dump($formulario);
        else :
            $dados = [
                "nome" =>  '',
                "telefone" => '',
                "estado" => '',

                "nome_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
            ];
        endif;
        $this->viewModal('modal/cadastrar-fornecedor-modal', $dados);
        // $this->view('fornecedor/cadastrarFornecedor', $dados);
    }

    public function visualizar($id)
    {
        $fornecedor = $this->fornecedorModel->selectById($id);
        $dados = [
            'fornecedorListar' => $fornecedor
        ];

        $this->view('fornecedor/visualizar', $dados);
    }

    public function deletar($id)
    {
        $idInt = (int) $id;
        if (is_int($idInt)) :
            if ($this->fornecedorModel->deletar($idInt)) :
                Sessao::mensagem('fornecedor', 'Fornecedor apagado com sucesso!', 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'FornecedorController/listarFornecedor');
            else:
                Sessao::mensagem('cliente', 'Erro!', 'bg-red');
            endif;
        endif;
    }
}
