<?php


class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->fornecedorModel = $this->model('FornecedorModel');
    }

    public function listarFornecedor(){
        $dados = [
            'fornecedores' => $this->fornecedorModel->selectAll()
        ];

        $this->view('fornecedor/listarFornecedor', $dados);

    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                "nome" =>  trim($formulario['nome']),
                "telefone" => trim($formulario['telefone']),
                "estado" => trim($formulario['estado']),
                "cidade" => trim($formulario['cidade']),

                "nome_erro" =>  '',
                "telefone_erro" => '',
                "estado_erro" => '',
                "cidade_erro" => '',
            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = "Preencha o campo <b>nome</b>";
                endif;

                if (empty($formulario['telefone'])) :
                    $dados['telefone_erro'] = "Preencha o campo <b>telefone</b>";
                endif;

                if (empty($formulario['estado'])) :
                    $dados['estado_erro'] = "Preencha o campo <b>estado</b>";
                endif;

                if (empty($formulario['cidade'])) :
                    $dados['cidade_erro'] = "Preencha o campo <b>cidade</b>";
                endif;
            else :
                if (Validar::validarCampoString($formulario['nome'])) :
                    $dados['nome_erro'] = "Nome informado é <b>invalido</b>";

                elseif(Validar::validarCampoNumerico($formulario['telefone'])):
                    $dados['telefone_erro'] = "Telefone informado é <b>invalido</b>";

                elseif(Validar::validarCampoString($formulario['estado'])):
                    $dados['estado_erro'] = "Estado informado é <b>invalido</b>";
                elseif(Validar::validarCampoString($formulario['cidade'])):
                    $dados['cidade_erro'] = "Cidade informado é <b>invalido</b>";
                else:
                    if ($this->fornecedorModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';

                    else :
                        die("Erro");

                    endif;
                endif;  
            endif;

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

        $this->view('fornecedor/cadastrarFornecedor', $dados);
    }
}
