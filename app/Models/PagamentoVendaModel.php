<?php

class PagamentoVendaModel
{
    private $Id;
    private $vendaId;
    private $formaPagamentoId;
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
     * @return mixed
     */
    public function getVendaId()
    {
        return $this->vendaId;
    }

    /**
     * @return mixed
     */
    public function getFormaPagamentoId()
    {
        return $this->formaPagamentoId;
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
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $vendaId
     */
    public function setVendaId($vendaId)
    {
        $this->vendaId = $vendaId;
    }

    /**
     * @param mixed $formaPagamentoId
     */
    public function setFormaPagamentoId($formaPagamentoId)
    {
        $this->formaPagamentoId = $formaPagamentoId;
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

    public function selectAll(){
        $this->db->query("SELECT * FROM pagamento_venda");
        return $this->db->resultados();
    }

    public function insert($ultimoId, $dados, $valor_total)
    {
        $this->setVendaId($ultimoId);
        $this->setFormaPagamentoId($dados['metodo_pagamento']);
        $this->setNumeroDeParcelas($dados['num_parcelas']);
        $this->setValorAPagar($valor_total);

        $this->db->query("INSERT INTO pagamento_venda(id_venda, id_forma_pagamento, numero_de_parcelas, valor_a_pagar) VALUES (:id_venda,:id_forma_pagamento, :numero_de_parcelas, :valor_a_pagar)");
        $this->db->bind(":id_venda", $this->getVendaId());
        $this->db->bind(":id_forma_pagamento", $this->getFormaPagamentoId());
        $this->db->bind(":numero_de_parcelas", $this->getNumeroDeParcelas());
        $this->db->bind(":valor_a_pagar", $this->getValorAPagar());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
