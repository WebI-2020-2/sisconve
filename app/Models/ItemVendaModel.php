<?php

class ItemVendaModel
{
    private $Id;
    private $produtoId;
    private $vendaId;
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
     * @return mixed
     */
    public function getProdutoId()
    {
        return $this->produtoId;
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
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $produtoId
     */
    public function setProdutoId($produtoId)
    {
        $this->produtoId = $produtoId;
    }

    /**
     * @param mixed $vendaId
     */
    public function setVendaId($vendaId)
    {
        $this->vendaId = $vendaId;
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
    public function selectAll()
    {
        $this->db->query("SELECT * FROM item_venda");
        return $this->db->resultados();
    }

    public function insert($dados, $ultimoId)
    {

        $quantidade = $dados['quantidade'];
        $valorUnitario = $dados['valor_unitario'];
        $idProduto = $dados['id_produto'];

        $this->setQuantidade($quantidade);
        $this->setValorUnitario($valorUnitario);
        $this->setProdutoId($idProduto);
        $this->setVendaId($ultimoId);
        
        for ($i = 0; $i < count($idProduto); $i++) :
            $this->db->query("INSERT INTO item_venda(id_produto, id_venda, valor_unitario,quantidade) VALUES (:id_produto, :id_venda, :valor_unitario, :quantidade)");
            $this->db->bind(":id_produto", $this->getProdutoId()[$i]);
            $this->db->bind(":id_venda", $this->getVendaId());
            $this->db->bind(":valor_unitario", $this->getValorUnitario()[$i]);
            $this->db->bind(":quantidade", $this->getQuantidade()[$i]);

            try {
                $this->db->executa();
            } catch (PDOException $err) {
                return false;
            }
        endfor;

        return true;

    }
}
