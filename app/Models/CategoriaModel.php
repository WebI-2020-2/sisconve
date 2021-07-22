<?php

class CategoriaModel
{
    private $Id;
    private $nomeCategoria;
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
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    /**
     * @param mixed $nomeCategoria
     */
    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;
    }
    /**
     * @return mixed
     */
    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    /**
     * @param mixed $ultimoId
     */
    public function setUltimoId($ultimoId)
    {
        $this->ultimoId = $ultimoId;
    }

    public function validarCategoria($categoria)
    {
        $this->setNomeCategoria($categoria);
        $this->db->query("SELECT nome_categoria FROM categoria WHERE nome_categoria = :nomecategoria");
        $this->db->bind(":nomecategoria", $this->getNomeCategoria());

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function insert($dados)
    {
        $this->setNomeCategoria($dados['nomecategoria']);

        $this->db->query("INSERT INTO categoria (nome_categoria) VALUES (:nomecategoria) RETURNING id_categoria");
        $this->db->bind(":nomecategoria", $this->getNomeCategoria());

        // print $this->db->ultimoIdInserido();

        if ($this->db->executa()) :
            $this->setUltimoId($this->db->ultimoId()['id_categoria']);
            return true;
        else :
            return false;
        endif;
    }
    public function selectAll()
    {
        $this->db->query('SELECT c.id_categoria, c.nome_categoria, sum(p.quantidade) as qunatidade_categoria FROM produto p, categoria c 
        WHERE p.id_categoria = c.id_categoria
        AND c.ativo <> false
        GROUP BY c.nome_categoria, c.id_categoria
        ORDER BY c.id_categoria ASC');
        return $this->db->resultados();
    }

    public function update($dados, $id)
    {
        $this->setNomeCategoria($dados['nomecategoria']);
        $this->setId($id);

        $this->db->query("UPDATE categoria SET nomecategoria = :nomecategoria WHERE id = :id");
        $this->db->bind(":nomecategoria", $this->getNomeCategoria());
        $this->db->bind(":id", $this->getId());

        if ($this->db->executa()) :

            return true;
        else :
            return false;
        endif;
    }

    public function delete($id)
    {
        $this->setId($id);
        $this->db->query("UPDATE categoria SET ativo = false WHERE id_categoria = :id_categoria");
        $this->db->bind(":id", $this->getId());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
