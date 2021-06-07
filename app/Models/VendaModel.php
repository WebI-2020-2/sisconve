<?php

class VendaModel
{
    private $Id;
    private CaixaModel $caixa;
    private ClienteModel $cliente;
    private $numParcelas;
    private $valorTotal;

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
    public function getCaixa()
    {
        return $this->caixa;
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
    public function getNumParcelas()
    {
        return $this->numParcelas;
    }

    /**
     * @return mixed
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param mixed $caixa
     */
    public function setCaixa($caixa)
    {
        $this->caixa = $caixa;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @param mixed $numParcelas
     */
    public function setNumParcelas($numParcelas)
    {
        $this->numParcelas = $numParcelas;
    }

    /**
     * @param mixed $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }
}
