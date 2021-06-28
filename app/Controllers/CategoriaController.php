<?php

class CategoriaController extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            URL::redirecionar('UsuarioController/login');
        endif;
        $this->categoriaModel = $this->model('CategoriaModel');
    }

    public function listarCategoria(){
        $dados =[
            'categorias' => $this->categoriaModel->selectAll()
        ];
        $this->view('categoria/listarCategorias', $dados);
    }

    public function cadastrarCategoria()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'nomecategoria' => trim($formulario['nomecategoria']),
                'nomecategoria_erro' => ''
            ];

            if (in_array("", $formulario)) :
                if (empty($formulario['nomecategoria'])) :
                    $dados['nomecategoria_erro'] = "Preencha o campo <b>nomecategoria</b>";

                endif;
                
            else :
                if (Validar::validarCampoString($formulario['nomecategoria'])) :
                    $dados['nomecategoria_erro'] = "Nome informado é invalido";
                elseif ($this->categoriaModel->validarCategoria($formulario['nomecategoria'])) :
                    $dados['nomecategoria_erro'] = "Nome informado já existe";
                else :
                    if ($this->categoriaModel->insert($dados)) :
                        Sessao::mensagem('categoria', 'Cadastro realizado como sucesso', 'alert alert-sucess');
                        $this->listarCategoria();
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
    public function editar() 
    {
        
    }
}
