<?php

class VendaModel
{
    private $Id;
    private $caixaId;
    private $clienteId;
    private $numParcelas;
    private $valorTotal;
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
    public function getCaixaId()
    {
        return $this->caixaId;
    }

    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->clienteId;
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
     * @return mixed
     */
    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $caixaId
     */
    public function setCaixaId($caixaId)
    {
        $this->caixaId = $caixaId;
    }

    /**
     * @param mixed $clienteId
     */
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
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

    /**
     * @param mixed $ultimoId
     */
    public function setUltimoId($ultimoId)
    {
        $this->ultimoId = $ultimoId;
    }
    public function selectAll()
    {
        $this->db->query("SELECT * FROM venda");
        return $this->db->resultados();
    }
    public function insert($dados)
    {
        $this->setCaixaId(1);
        $this->setClienteId(1);
        $num_parcelas_int = (int)$dados['num_parcelas'];
        $this->setNumParcelas($num_parcelas_int);
        $this->db->query("INSERT INTO venda(id_caixa, id_cliente, num_parcelas) VALUES (:id_caixa, :id_cliente, :num_parcelas)RETURNING id_venda");

        $this->db->bind(":id_caixa", $this->getCaixaId());
        $this->db->bind(":id_cliente", $this->getClienteId());
        $this->db->bind(":num_parcelas", $this->getNumParcelas());

        if ($this->db->executa()) :
            $this->setUltimoId($this->db->ultimoId()['id_venda']);
            return true;
        else :
            return false;
        endif;
    }
}
