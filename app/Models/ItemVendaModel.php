<?php

class ItemVendaModel
{
    private $Id;
    private ProdutoModel $produto;
    private VendaModel $venda;
    private $valorUnitario;
    private $quantidade;

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
    public function getProduto()
    {
        return $this->produto;
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
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @param mixed $venda
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
    }

    /**
     * @param mixed $valorUnitario
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    public function selectAll(){
        $this->db->query("SELECT * FROM item_venda");
        return $this->db->resultados();
    }
}
