<?php

class ClienteModel
{
    private $Id;
    private $nomeCliente;
    private $cpf;
    private $credito;
    private $debito;
    
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

    public function insert($dados)
    {
        $this->setNomeCliente($dados['nome']);
        $this->setCpf($dados['cpf']);

        $this->db->query("INSERT INTO cliente(nome_cliente, cpf) VALUES (:nome_cliente, :cpf)");

        $this->db->bind(":nome_cliente", $this->getNomeCliente());
        $this->db->bind(":cpf", $this->getCpf());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function VerificarCpf($cpf)
    {
        $this->setCpf($cpf);
        
        $this->db->query("SELECT cpf from cliente WHERE cpf = :cpf");
        $this->db->bind(":cpf", $this->getcpf());

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function a() 
    {
        $this->db->query("SELECT * FROM cliente");
        return $this->db->resultados();
    }

}
