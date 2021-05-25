<?php

class DevolucaoModel
{
    private $Id;
    private ProdutoModel $produto;
    private ItemVendaModel $itemVenda;
    private $motivoDevolucao;
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
    public function getItemVenda()
    {
        return $this->itemVenda;
    }

    /**
     * @return mixed
     */
    public function getMotivoDevolucao()
    {
        return $this->motivoDevolucao;
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
     * @param mixed $itemVenda
     */
    public function setItemVenda($itemVenda)
    {
        $this->itemVenda = $itemVenda;
    }

    /**
     * @param mixed $motivoDevolucao
     */
    public function setMotivoDevolucao($motivoDevolucao)
    {
        $this->motivoDevolucao = $motivoDevolucao;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
}

// CREATE TABLE "devolucao" (
//     "id_devolucao" serial NOT NULL,
//     "id_produto" int,
//     "id_item_venda" int,
//     "motivo_devolucao" varchar(255),
//     "quantidade" int,
//       "criado_em" TIMESTAMP DEFAULT CURRENT_DATE,
//     PRIMARY KEY ("id_devolucao")
//   );