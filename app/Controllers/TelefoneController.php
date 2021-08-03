<?php
class TelefoneController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            header("Location:".URL.DIRECTORY_SEPARATOR.'FuncionarioController/login');
            // URL::redirecionar('FuncionarioController/login');
        endif;
        $this->telefoneModel = $this->model('TelefoneModel');
    }

    public function index(){
        
    }
    public function listarTelefone(){
        $dados =[
            'Telefones' => $this->telefoneModel->selectAll()
        ];
        $this->view('telefone/listarTelefones', $dados);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                "cliente_id" => trim($formulario['cliente_id']),
                'num_telefone'=> trim($formulario['num_telefone']),
                'ddd' => trim($formulario['ddd']),
                // 'whatsapp' => trim($formulario['whatsapp']),

                "cliente_id_erro" => '',
                'num_telefone_erro' => '',
                'ddd_erro' => '',
                'whatsapp_erro' => '',

            ];
            if (in_array("", $formulario)) :

                if (empty($formulario['num_telefone'])) :
                    $dados['num_telefone_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['ddd'])) :
                    $dados['ddd_erro'] = "Preencha o campo";
                endif;

                if (empty($formulario['cliente_id'])) :
                    $dados['cliente_id_erro'] = "Preencha o campo";
                endif;

            else:
                if (Validar::validarCampoNumerico($formulario['num_telefone'])):
                    $dados['num_telefone_erro'] = "Formato invalido";
                elseif(Validar::validarCampoNumerico($formulario['ddd'])):
                    $dados['ddd_erro'] = "Formato invalido";
                else:
                    if ($this->telefoneModel->insert($dados)) :
                        echo 'Cadastro realizado como sucesso <hr>';
                    else :
                        die("Erro");

                    endif;
                endif;

            endif;
        else:
            $dados = [
                "cliente_id" => '',
                'num_telefone'=> '',
                'ddd' => '',
                'whatsapp' => '',

                "cliente_id_erro" => '',
                'num_telefone_erro' => '',
                'ddd_erro' => '',
                'whatsapp_erro' => '',

            ];
        endif;

        $this->view('telefone/CadastarTelefone', $dados);
    }
}