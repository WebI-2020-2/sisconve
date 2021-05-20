<?php

class ClienteModel
{
    private $nomeCliente;
    private $cpf;
    private $credito;
    private $debito;
    
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getNomeCliente()
    {
        return $this->nomeCliente;
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
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * @return mixed
     */
    public function getDebito()
    {
        return $this->debito;
    }

    /**
     * @param mixed $nomeCliente
     */
    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $credito
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;
    }

    /**
     * @param mixed $debito
     */
    public function setDebito($debito)
    {
        $this->debito = $debito;
    }


}
