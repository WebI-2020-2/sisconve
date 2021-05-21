<?php

class CaixaModel
{
    private FuncionarioModel $funcionario;
    private $valorEmCaixa;
    private $status;

    public function __construct() 
    {
        $this->db = new Database();
    }
    
    /**
     * @return mixed
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }

    /**
     * @return mixed
     */
    public function getValorEmCaixa()
    {
        return $this->valorEmCaixa;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $funcionario
     */
    public function setFuncionario($funcionario)
    {
        $this->funcionario = $funcionario;
    }

    /**
     * @param mixed $valorEmCaixa
     */
    public function setValorEmCaixa($valorEmCaixa)
    {
        $this->valorEmCaixa = $valorEmCaixa;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
