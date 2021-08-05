<?php

class FuncionarioModel
{
    private $Id;
    private $nomeFuncionario;
    private $telefone;
    private $cpf;
    private $endereco;
    private $cargo;
    private $salario;
    private $nivel_acesso;

    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    
    /**
     * @return mixed
     */
    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param mixed $nomeFuncionario
     */
    public function setNomeFuncionario($nomeFuncionario)
    {
        $this->nomeFuncionario = $nomeFuncionario;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @param mixed $salario
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    
    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @return mixed
     */
    public function getNivel_acesso()
    {
        return $this->nivel_acesso;
    }

    /**
     * @param mixed $nivel_acesso
     */
    public function setNivel_acesso($nivel_acesso)
    {
        $this->nivel_acesso = $nivel_acesso;
    }

    public function validarCpf($cpf)
    {
        $this->setCpf($cpf);
        $this->db->query("SELECT cpf FROM funcionario WHERE cpf = :cpf");
        $this->db->bind(":cpf", $this->getCpf());

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;

    }
    public function validarTelefone($telefone)
    {
        $this->setTelefone($telefone);
        $this->db->query("SELECT telefone FROM funcionario WHERE telefone = :telefone");
        $this->db->bind(":telefone", $this->getTelefone());

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function validarUsuario($username)
    {
        $this->setUsuario($username);
        $this->db->query("SELECT usuario FROM funcionario WHERE usuario = :usuario");
        $this->db->bind(":usuario", $this->getUsuario($username));

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function findByAll(){
        $this->db->query("SELECT * FROM funcionario");
        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function insert($dados)
    {
        $this->setNomeFuncionario($dados['nome_funcionario']);
        $this->setTelefone($dados['telefone']);
        $this->setCpf($dados['cpf']);
        $this->setEndereco($dados['endereco']);
        $this->setCargo($dados['cargo']);
        $this->setSalario($dados['salario']);
        $this->setEmail($dados['email']);

        $this->db->query("INSERT INTO funcionario(nome_funcionario, telefone, cpf, endereco, cargo, salario, email) VALUES (:nome_funcionario, :telefone, :cpf, :endereco, :cargo, :salario, :email)");

        $this->db->bind(":nome_funcionario",  $this->getNomeFuncionario());
        $this->db->bind(":telefone", $this->getTelefone());
        $this->db->bind(":cpf", $this->getCpf());
        $this->db->bind(":endereco", $this->getEndereco());
        $this->db->bind(":cargo", $this->getCargo());
        $this->db->bind(":salario", $this->getSalario());
        $this->db->bind(":email", $this->getEmail());
        

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function selectAll(){
        $this->db->query("SELECT * FROM funcionario");
        return $this->db->resultados();
    }

    public function selectTodos()
    {
        $this->setUsuario('admin');
        $this->setId($_SESSION["FUNCIONARIO_ID"]);
        $this->db->query("SELECT * FROM funcionario WHERE nome_funcionario <> :nome_funcionario AND id_funcionario <> :id_funcionario");
        $this->db->bind(":nome_funcionario", $this->getUsuario());
        $this->db->bind(":id_funcionario", $this->getId());
        return $this->db->resultados();
    }

    public function login($usuario, $senha)
    {
        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $this->db->query("SELECT * FROM funcionario WHERE usuario = :usuario AND ativo <> false");
        $this->db->bind(":usuario", $this->getUsuario());

        if ($this->db->resultado()) :
            $resultado = $this->db->resultado();
            if (password_verify($this->getSenha(), $resultado->senha)) :
                return $resultado;
            else :
                return false;
            endif;
        else :
            return false;
        endif;
    }

    public function insertDois($dados)
    {
        $nivel_acesso = intval($dados['nivel_acesso']);

        $this->setNomeFuncionario($dados['nome_funcionario']);
        $this->setTelefone($dados['telefone']);
        $this->setCpf($dados['cpf']);
        $this->setEndereco($dados['endereco']);
        $this->setCargo($dados['cargo']);
        $this->setSalario($dados['salario']);
        $this->setUsuario($dados['usuario']);
        $this->setSenha($dados['senha']);
        $this->setEmail($dados['email']);
        $this->setNivel_acesso($nivel_acesso);

        $this->db->query("INSERT INTO funcionario(nome_funcionario, telefone, cpf, endereco, cargo, salario, usuario, senha, nivel_acesso, email) VALUES (:nome_funcionario, :telefone, :cpf, :endereco, :cargo, :salario, :usuario, :senha, :nivel_acesso, :email)");

        $this->db->bind(":nome_funcionario",  $this->getNomeFuncionario());
        $this->db->bind(":telefone", $this->getTelefone());
        $this->db->bind(":cpf", $this->getCpf());
        $this->db->bind(":endereco", $this->getEndereco());
        $this->db->bind(":cargo", $this->getCargo());
        $this->db->bind(":salario", $this->getSalario());
        $this->db->bind(":usuario", $this->getUsuario());
        $this->db->bind(":senha", $this->getSenha());
        $this->db->bind(":nivel_acesso", $this->getNivel_acesso());
        $this->db->bind(":email", $this->getEmail());

        
        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function deletar($id) 
    {
        $this->setId($id);
        $this->db->query("UPDATE funcionario SET ativo = false WHERE id_funcionario = :id");
        $this->db->bind(":id", $this->getId());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function updateDois($dados)
    {
        $this->setId($dados['id_funcionario']);
        $this->setNomeFuncionario($dados['nome_funcionario']);
        $this->setCpf($dados['cpf']);
        $this->setTelefone($dados['telefone']);
        $this->setEmail($dados['email']);
        $this->setEndereco($dados['endereco']);
        $this->setCargo($dados['cargo']);
        $this->setSalario($dados['salario']);

        $this->db->query("UPDATE funcionario SET nome_funcionario = :nome_funcionario, cpf = :cpf, telefone = :telefone, email = :email, endereco = :endereco, cargo = :cargo, salario = :salario WHERE id_funcionario = :id_funcionario");

        $this->db->bind(":nome_funcionario",  $this->getNomeFuncionario());
        $this->db->bind(":telefone", $this->getTelefone());
        $this->db->bind(":cpf", $this->getCpf());
        $this->db->bind(":endereco", $this->getEndereco());
        $this->db->bind(":cargo", $this->getCargo());
        $this->db->bind(":salario", $this->getSalario());
        $this->db->bind(":email", $this->getEmail());
        $this->db->bind(":id_funcionario", $this->getId());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;

    }

}
