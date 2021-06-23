<?php

class PagamentoCompraModel
{
    private $Id;
    private CompraModel $compra;
    private FormaPagamentoModel $formaDePagamento;
    private $parcelas;
    private $prazo;
    private $status;

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
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * @return mixed
     */
    public function getFormaDePagamento()
    {
        return $this->formaDePagamento;
    }

    /**
     * @return mixed
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * @return mixed
     */
    public function getPrazo()
    {
        return $this->prazo;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $compra
     */
    public function setCompra($compra)
    {
        $this->compra = $compra;
    }

    /**
     * @param mixed $formaDePagamento
     */
    public function setFormaDePagamento($formaDePagamento)
    {
        $this->formaDePagamento = $formaDePagamento;
    }

    /**
     * @param mixed $parcelas
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }

    /**
     * @param mixed $prazo
     */
    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function selectAll(){
        $this->db->query("SELECT * FROM pagamento_compra");
        return $this->db->resultados();
    }
}

