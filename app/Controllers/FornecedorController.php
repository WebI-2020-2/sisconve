<?php


class FornecedorController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
            $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
            $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
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
                    Sessao::mensagem('Preencha o campo Nome!'. $this->imgError, 'bg-red');
                    $dados['nome_erro'] = "Preencha o campo nome";
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                endif;

                if (empty($formulario['telefone'])) :
                    Sessao::mensagem('Preencha o campo Telefone!'. $this->imgError, 'bg-red');
                    $dados['telefone_erro'] = "Preencha o campo telefone";
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                endif;

                if (empty($formulario['estado'])) :
                    Sessao::mensagem('Preencha o campo Estado!'. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                    $dados['estado_erro'] = "Preencha o campo estado";
                endif;

                if (empty($formulario['cidade'])) :
                    Sessao::mensagem('Preencha o campo Cidade! '. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                    $dados['cidade_erro'] = "Preencha o campo cidade";
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome-fornecedor'])) :
                    //$dados['nome_erro'] = "Nome informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O nome informado é inválido! '. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoNumerico($formulario['telefone-fornecedor'])) :
                    //$dados['telefone_erro'] = "Telefone informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O telefone informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (strlen($formulario['telefone-fornecedor']) != 11) :
                    //$dados['telefone_erro'] = "Telefone informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O tamnho do telefone informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['estado-fornecedor'])) :
                    //$dados['estado_erro'] = "Estado informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O estado informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['cidade-fornecedor'])) :
                    //$dados['cidade_erro'] = "Cidade informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! A cidade informada é inválida!'.$imgError. $this->imgError, 'bg-red');
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
                Sessao::mensagem('cliente', 'Erro!'. $this->imgError, 'bg-red');
            endif;
        endif;
    }

    public function editar()
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
                "id_fornecedor" => (int) trim($formulario['id_fornecedor']),

                "nome_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    Sessao::mensagem('Preencha o campo Nome!'. $this->imgError, 'bg-red');
                    $dados['nome_erro'] = "Preencha o campo nome";
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                endif;

                if (empty($formulario['telefone'])) :
                    Sessao::mensagem('Preencha o campo Telefone!'. $this->imgError, 'bg-red');
                    $dados['telefone_erro'] = "Preencha o campo telefone";
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                endif;

                if (empty($formulario['estado'])) :
                    Sessao::mensagem('Preencha o campo Estado!'. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                    $dados['estado_erro'] = "Preencha o campo estado";
                endif;

                if (empty($formulario['cidade'])) :
                    Sessao::mensagem('Preencha o campo Cidade! '. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                    $dados['cidade_erro'] = "Preencha o campo cidade";
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome-fornecedor'])) :
                    //$dados['nome_erro'] = "Nome informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O nome informado é inválido! '. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoNumerico($formulario['telefone-fornecedor'])) :
                    //$dados['telefone_erro'] = "Telefone informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O telefone informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (strlen($formulario['telefone-fornecedor']) != 11) :
                    //$dados['telefone_erro'] = "Telefone informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O tamnho do telefone informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['estado-fornecedor'])) :
                    //$dados['estado_erro'] = "Estado informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! O estado informado é inválido!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                elseif (Validar::validarCampoString($formulario['cidade-fornecedor'])) :
                    //$dados['cidade_erro'] = "Cidade informado é invalido";
                    Sessao::mensagem('fornecedor', 'Erro! A cidade informada é inválida!'.$imgError. $this->imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');

                else :
                    if ($this->fornecedorModel->update($dados)) :
                        Sessao::mensagem('fornecedor', 'Fornecedor atualizado com sucesso!'.$imgSuccess, 'bg-green');
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
        $this->view('fornecedor/visualizar', $dados);
    }
}
