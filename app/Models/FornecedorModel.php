<?php


class FornecedorModel
{
    private $Id;
    private $nomeFornecedor;
    private $telefone;
    private $cidade;
    private $estado;
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
    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $nomeFornecedor
     */
    public function setNomeFornecedor($nomeFornecedor)
    {
        $this->nomeFornecedor = $nomeFornecedor;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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


    public function insert($dados)
    {
        $this->setNomeFornecedor($dados['nome']);
        $this->setTelefone($dados['telefone']);
        $this->setEstado($dados['estado']);
        $this->setCidade($dados['cidade']);


        $this->db->query("INSERT INTO fornecedor(nome_fornecedor, telefone, estado, cidade) VALUES (:nome_fornecedor, :telefone, :estado, :cidade) RETURNING id_fornecedor");

        $this->db->bind(":nome_fornecedor", $this->getNomeFornecedor());
        $this->db->bind(":telefone", $this->getTelefone());
        $this->db->bind(":estado", $this->getEstado());
        $this->db->bind(":cidade", $this->getCidade());

        if ($this->db->resultado()) :
            $this->setUltimoId($this->db->ultimoId());
            return true;
        else :
            return false;
        endif;
    }
    public function selectAll()
    {
        $this->db->query("SELECT * FROM fornecedor");
        return $this->db->resultados();
    }
}
