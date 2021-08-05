<?php

class PagamentoCompraModel
{
    private $Id;
    private $compraId;
    private $formaDePagamentoId;
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
     * @return mixed
     */
    public function getCompraId()
    {
        return $this->compraId;
    }

    /**
     * @return mixed
     */
    public function getFormaDePagamentoId()
    {
        return $this->formaDePagamentoId;
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
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $compraId
     */
    public function setCompraId($compraId)
    {
        $this->compraId = $compraId;
    }

    /**
     * @param mixed $formaDePagamentoId
     */
    public function setFormaDePagamentoId($formaDePagamentoId)
    {
        $this->formaDePagamentoId = $formaDePagamentoId;
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
    public function insert($dados, $ultimoidCompra)
    {
        $this->setCompraId($ultimoidCompra);
        $this->setFormaDePagamentoId($dados['metodo_pagamento']);
        $this->setParcelas($dados['num-parcelas']);

        $this->db->query("INSERT INTO pagamento_compra(id_compra, id_forma_de_pagamento, parcelas) VALUES (:id_compra,:id_forma_pagamento, :numero_de_parcelas)");
        $this->db->bind(":id_compra", $this->getCompraId());
        $this->db->bind(":id_forma_pagamento", $this->getFormaDePagamentoId());
        $this->db->bind(":numero_de_parcelas", $this->getParcelas());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}

