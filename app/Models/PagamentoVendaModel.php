<?php

class PagamentoVendaModel
{
    private $Id;
    private VendaModel $venda;
    private FormaPagamentoModel $formaPagamento;
    private $numeroDeParcelas;
    private $valorAPagar;
    private $valorPago;

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
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @return mixed
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    /**
     * @return mixed
     */
    public function getNumeroDeParcelas()
    {
        return $this->numeroDeParcelas;
    }

    /**
     * @return mixed
     */
    public function getValorAPagar()
    {
        return $this->valorAPagar;
    }

    /**
     * @return mixed
     */
    public function getValorPago()
    {
        return $this->valorPago;
    }

    /**
     * @param mixed $venda
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
    }

    /**
     * @param mixed $formaPagamento
     */
    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }

    /**
     * @param mixed $numeroDeParcelas
     */
    public function setNumeroDeParcelas($numeroDeParcelas)
    {
        $this->numeroDeParcelas = $numeroDeParcelas;
    }

    /**
     * @param mixed $valorAPagar
     */
    public function setValorAPagar($valorAPagar)
    {
        $this->valorAPagar = $valorAPagar;
    }

    /**
     * @param mixed $valorPago
     */
    public function setValorPago($valorPago)
    {
        $this->valorPago = $valorPago;
    }
}
