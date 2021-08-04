<?php

class CategoriaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'FuncionarioController/login');
        // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->categoriaModel = $this->model('CategoriaModel');
    }

    public function listarCategoria()
    {
        $dados = [
            'categorias' => $this->categoriaModel->selectAll()
        ];
        $this->view('categoria/listarCategorias', $dados);
    }

    public function cadastrarCategoria()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';

        if (isset($formulario)) :
            $dados = [
                'nomecategoria' => trim($formulario['nomecategoria']),
                'nomecategoria_erro' => ''
            ];

            if (in_array("", $formulario)) :
                if (empty($formulario['nomecategoria'])) :
                    Sessao::mensagem('categoria', 'Preencha o campo <b>nomecategoria</b>!' . $imgError, 'bg-red');
                    header("Location:".URL.DIRECTORY_SEPARATOR.'FornecedorController/listarFornecedor');
                    $dados['nomecategoria_erro'] = "Preencha o campo <b>nomecategoria</b>";

                endif;

            else :
                if (Validar::validarCampoString($formulario['nomecategoria'])) :
                    $dados['nomecategoria_erro'] = "Nome informado é invalido";
                    Sessao::mensagem('categoria', 'Erro! Nome informado inválido!' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CategoriaController/listarCategoria');

                elseif ($this->categoriaModel->validarCategoria($formulario['nomecategoria'])) :
                    //$dados['nomecategoria_erro'] = "Nome informado já existe";
                    Sessao::mensagem('categoria', 'Erro! O nome informado já existe!' . $imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CategoriaController/listarCategoria');

                else :
                    if ($this->categoriaModel->insert($dados)) :
                        Sessao::mensagem('categoria', 'Cadastro realizado como sucesso!' . $imgSuccess, 'bg-green');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'CategoriaController/listarCategoria');
                    // URL::redirecionar('CategoriaController/listarCategoria');

                    else :
                        die("Erro");

                    endif;
                endif;

            endif;
        // var_dump($formulario);
        else :
            $dados = [
                'nomecategoria' => '',
                'nomecategoria_erro' => ''
            ];

        endif;
        $this->view('categoria/cadastrarCategoria', $dados);
    }
    public function editar($id)
    {
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = [
            'nomecategoria' => trim($formulario['nomecategoria']),
            'nomecategoria_erro' => ''
        ];

        if (Validar::validarCampoString($formulario['nomecategoria'])) :
            // $dados['nomecategoria_erro'] = "Nome informado é invalido";
            Sessao::mensagem('categoria', 'Erro! Nome informado inválido!' . $imgError, 'bg-red');
            header("Location:" . URL . DIRECTORY_SEPARATOR . 'CategoriaController/listarCategoria');;
        else:
            echo 'Pode cadastar';
            // $idInte (int) $id;
            // if ($this->categoriaModel->update($dados, $id)) :

            // else :
            //     die("Erro");
            // endif;
        endif;

        $this->viewModal('modal/editar-cliente-modal');
    }

    public function deletar($id)
    {
        $idInt = (int) $id;
        if (is_int($idInt)) :
            if ($this->categoriaModel->deletar($idInt)) :
                Sessao::mensagem('categoria', 'Categoria apagado com sucesso!', 'bg-green');
                header("Location:" . URL . DIRECTORY_SEPARATOR . 'CategoriaController/listarCategorias');
            else :
                Sessao::mensagem('categoria', 'Erro!', 'bg-red');
            endif;
        endif;
    }
}
