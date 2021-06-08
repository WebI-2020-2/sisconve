<?php

class CategoriaModel
{
    private $Id;
    private $nomeCategoria;

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

        $this->db->query("INSERT INTO categoria (nome_categoria) VALUES (:nomecategoria)");

        $this->db->bind(":nomecategoria", $this->getNomeCategoria());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

}
