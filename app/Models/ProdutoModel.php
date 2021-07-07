<?php

class ProdutoModel
{
    private $Id;
    private $categoria_id;
    private $nome_produto;
    private $icms;
    private $ipi;
    private $frete;
    private $acrescimo_despesas;
    private $preco_na_fabrica;
    private $preco_compra;
    private $preco_venda;
    private $lucro;
    private $desconto;
    private $quantidade;
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
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * @return mixed
     */
    public function getNome_produto()
    {
        return $this->nome_produto;
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
    public function getAcrescimo_despesas()
    {
        return $this->acrescimo_despesas;
    }

    /**
     * @return mixed
     */
    public function getPreco_na_fabrica()
    {
        return $this->preco_na_fabrica;
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
    public function getPreco_venda()
    {
        return $this->preco_venda;
    }

    /**
     * @return mixed
     */
    public function getLucro()
    {
        return $this->lucro;
    }

    /**
     * @return mixed
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
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
     * @param mixed $categoria_id
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @param mixed $nome_produto
     */
    public function setNome_produto($nome_produto)
    {
        $this->nome_produto = $nome_produto;
    }

    /**
     * @param mixed $icms
     */
    public function setIcms($icms)
    {
        $this->icms = $icms;
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
     * @param mixed $acrescimo_despesas
     */
    public function setAcrescimo_despesas($acrescimo_despesas)
    {
        $this->acrescimo_despesas = $acrescimo_despesas;
    }

    /**
     * @param mixed $preco_na_fabrica
     */
    public function setPreco_na_fabrica($preco_na_fabrica)
    {
        $this->preco_na_fabrica = $preco_na_fabrica;
    }

    /**
     * @param mixed $preco_compra
     */
    public function setPreco_compra($preco_compra)
    {
        $this->preco_compra = $preco_compra;
    }

    /**
     * @param mixed $preco_venda
     */
    public function setPreco_venda($preco_venda)
    {
        $this->preco_venda = $preco_venda;
    }

    /**
     * @param mixed $lucro
     */
    public function setLucro($lucro)
    {
        $this->lucro = $lucro;
    }

    /**
     * @param mixed $desconto
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
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
        $this->db->query("SELECT
        produto.id_produto,
        produto.nome_produto,
        categoria.nome_categoria,
        categoria.id_categoria,
        produto.icms,
        produto.ipi,
        produto.frete,
        produto.preco_compra,
        produto.preco_na_fabrica,
        produto.preco_venda,
        produto.lucro,
        produto.desconto,
        produto.quantidade 
    FROM
        produto,
        categoria 
    WHERE
        produto.id_categoria = categoria.id_categoria 
    ORDER BY
        produto.id_produto ASC
        ");
        return $this->db->resultados();
    }
    public function insert($dados)
    {
        $categoriaInt = (int)$dados['categoria'];
        $this->setCategoria_id($categoriaInt);
        $this->setNome_produto($dados['nome_produto']);

        $this->db->query("INSERT INTO produto(id_categoria, nome_produto) VALUES (:id_categoria, :nome_produto) RETURNING id_produto");
        $this->db->bind(":id_categoria", $this->getCategoria_id());
        $this->db->bind(":nome_produto", $this->getNome_produto());

        if ($this->db->executa()) :
            $this->setUltimoId($this->db->ultimoId()['id_produto']);
            return true;
        else :
            return false;
        endif;
    }

    public function validarQuantidade($dados)
    {
        $qunatidadeInt = (int)$dados['quantidade'];
        $this->setQuantidade($qunatidadeInt);
        $this->db->query("SELECT quantidade FROM produto WHERE quantidade <= :quantidade");
        $this->db->bind(":quantidade", $this->getQuantidade());
        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function selectById($id)
    {
        $this->setId($id);
        $this->db->query("SELECT
        produto.id_produto,
        produto.nome_produto,
        categoria.nome_categoria,
        produto.icms,
        produto.ipi,
        produto.frete,
        produto.preco_compra,
        produto.preco_na_fabrica,
        produto.preco_venda,
        produto.lucro,
        produto.desconto,
        produto.quantidade 
    FROM
        produto,
        categoria 
    WHERE
        produto.id_categoria = categoria.id_categoria
    AND produto.id_produto = :id_produto");
        $this->db->bind(":id_produto", $this->getId());
        return $this->db->resultados();
    }
}
