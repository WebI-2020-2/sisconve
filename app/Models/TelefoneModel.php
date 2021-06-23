<?php


class TelefoneModel
{
    private $Id;
    private ClienteModel $cliente;
    private $numTelefone;
    private $ddd;
    private $whatsapp;

    public function __construct() 
    {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
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
    public function getNumTelefone()
    {
        return $this->numTelefone;
    }

    /**
     * @return mixed
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @return mixed
     */
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @param mixed $numTelefone
     */
    public function setNumTelefone($numTelefone)
    {
        $this->numTelefone = $numTelefone;
    }

    /**
     * @param mixed $ddd
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }

    /**
     * @param mixed $whatsapp
     */
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }
    public function selectAll(){
        $this->db->query("SELECT * FROM telefone");
        return $this->db->resultados();
    }

}

