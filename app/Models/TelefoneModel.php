<?php


class TelefoneModel
{
    private $Id;
    private $idCliente;
    private $numTelefone;
    private $ddd;
    private $whatsapp;
    private $ultimoId;


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
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
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
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
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

    /**
     * @return mixed
     */
    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    /**
     * @param mixed $ultimoId
     */
    public function setUltimoId($ultimoId)
    {
        $this->ultimoId = $ultimoId;
    }
    
    public function selectAll(){
        $this->db->query("SELECT * FROM telefone");
        return $this->db->resultados();
    }

    public function insert($dados, $ultimoid)
    {
        $this->setNumTelefone($dados['num_telefone']);
        $this->setDdd($dados['ddd']);
        $this->setIdCliente($ultimoid);
        

        $this->db->query("INSERT INTO telefone(id_cliente, num_telefone, ddd) VALUES (:id_cliente, :num_telefone, :ddd)");

        $this->db->bind(":id_cliente", $this->getIdCliente());
        $this->db->bind(":num_telefone", $this->getNumTelefone());
        $this->db->bind(":ddd", $this->getDdd());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

}

