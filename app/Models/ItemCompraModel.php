<?php

class ItemCompraModel
{
    private $Id;
    private ProdutoModel $produto;
    private CompraModel $compra;
    private $ipi;
    private $frete;
    private $icms;
    private $preco_compra;
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
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * @return mixed
     */
    public function getIpi()
    {
        return $this->ipi;
    }

    /**
     * @return mixed
     */
    public function getFrete()
    {
        return $this->frete;
    }

    /**
     * @return mixed
     */
    public function getIcms()
    {
        return $this->icms;
    }

    /**
     * @return mixed
     */
    public function getPreco_compra()
    {
        return $this->preco_compra;
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
     * @param mixed $compra
     */
    public function setCompra($compra)
    {
        $this->compra = $compra;
    }

    /**
     * @param mixed $ipi
     */
    public function setIpi($ipi)
    {
        $this->ipi = $ipi;
    }

    /**
     * @param mixed $frete
     */
    public function setFrete($frete)
    {
        $this->frete = $frete;
    }

    /**
     * @param mixed $icms
     */
    public function setIcms($icms)
    {
        $this->icms = $icms;
    }

    /**
     * @param mixed $preco_compra
     */
    public function setPreco_compra($preco_compra)
    {
        $this->preco_compra = $preco_compra;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    public function selectAll(){
        $this->db->query("SELECT * FROM item_compra");
        return $this->db->resultados();
    }
}
