<?php

class UsuarioModel
{
    private $usuario;
    private $senha;
    private $email;
    private $nomeCompleto;
    private $status;
    private $nivelAcesso;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getNomeCompleto()
    {
        return $this->nomeCompleto;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
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

    /**
     * @param mixed $nomeCompleto
     */
    public function setNomeCompleto($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $nivelAcesso
     */
    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;
    }

    public function insert($dados)
    {
        $this->setUsuario($dados['usuario']);
        $this->setSenha($dados['senha']);
        $this->setEmail($dados['email']);
        $this->setNomeCompleto($dados['nome_completo']);
        $this->setStatus($dados['status']);
        $this->setNivelAcesso($dados['nivel_acesso']);

        $this->db->query("INSERT INTO usuario(usuario, senha, email, nome_completo, status, nivel_acesso) VALUES (:usuario, :senha, :email, :nome_completo, :status, :nivel_acesso)");

        $this->db->bind("usuario", $this->getUsuario());
        $this->db->bind("senha", $this->getSenha());
        $this->db->bind("email", $this->getEmail());
        $this->db->bind("nome_completo", $this->getNivelAcesso());
        $this->db->bind("status", $this->getStatus());
        $this->db->bind("nivel_acesso", $this->getNivelAcesso());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
    
    public function login($email, $senha)
    {
        $this->db->query("SELECT * FROM usuario WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

    public function Delete($dados)
    {
        $this->setUsuario($dados['usuario']);

        $this->db->query("UPDATE usuario set status = f WHERE usuario = :usuario");  

        $this->db->bind("usuario", $this->getUsuario());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
