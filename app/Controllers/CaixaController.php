<?php
class CaixaController extends Controller
{
    public function __construct()
    {

        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->caixaModel = $this->model('CaixaModel');
        

    }
    public function listarCaixa()
    {
        $dados = [
            'caixas' => $this->caixaModel->selectAll()
        ];
        $this->view('caixa/listarCaixas', $dados);
    }

    public function cadastrar()
    {
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'num-caixa' => trim($formulario['num-caixa']),
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['num-caixa'])) :
                    Sessao::mensagem('caixa', 'Preencha o campo Número do caixa!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                endif;

            else:
                if (Validar::validarCampoNumerico($formulario['num-caixa'])) :
                    Sessao::mensagem('caixa', 'Formato de Número do caixa informado é invalido!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                elseif ($this->caixaModel->validarCaixa($formulario['num-caixa'])):
                    Sessao::mensagem('caixa', 'O caixa ja existe!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                else:
                    if ($this->caixaModel->insert($dados)) :
                        Sessao::mensagem('caixa', 'Caixa Cadastrado com sucesso!' . $this->$imgSuccess, 'bg-green');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            // var_dump($formulario);
        else:
            $dados = [
                'num-caixa' => '',
            ];
        endif;


        $this->viewModal('modal/cadastrar-caixa-modal');
    }

    public function editar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $imgSuccess = '<img id="success" src="../public/img/check-icon.svg" alt="Sucesso">';
        $imgError = '<img id="error" src="../public/img/block-icon.svg" alt="Erro">';
        if (isset($formulario)) :
            $dados = [
                'num-caixa' => trim($formulario['num-caixa']),
                'id_caixa' => trim($formulario['id_caixa'])
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['num-caixa'])) :
                    Sessao::mensagem('caixa', 'Preencha o campo Número do caixa!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                endif;

            else:
                if (Validar::validarCampoNumerico($formulario['num-caixa'])) :
                    Sessao::mensagem('caixa', 'Formato de Número do caixa informado é invalido!' . $this->$imgError, 'bg-red');
                    header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                else:
                    if ($this->caixaModel->update($dados)) :
                        Sessao::mensagem('caixa', 'Caixa Cadastrado com sucesso!' . $this->$imgSuccess, 'bg-green');
                        header("Location:" . URL . DIRECTORY_SEPARATOR . 'CaixaController/listarCaixa');
                    else :
                        die("Erro");

                    endif;
                endif;
            endif;
            // var_dump($formulario);
        else:
            $dados = [
                'num-caixa' => '',
            ];
        endif;
        $this->viewModal('modal/editar-cliente-modal');
    }
}
