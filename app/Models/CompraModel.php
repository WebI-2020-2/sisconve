<?php

class CompraModel
{
    private $Id;
    private $funcionario_id;
    private $fornecedor_id;
    private $valorTotal;
    private $parcelas;
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
    public function getFuncionario_id()
    {
        return $this->funcionario_id;
    }

    /**
     * @return mixed
     */
    public function getFornecedor_id()
    {
        return $this->fornecedor_id;
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
    public function getParcelas()
    {
        return $this->parcelas;
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
     * @param mixed $funcionario_id
     */
    public function setFuncionario_id($funcionario_id)
    {
        $this->funcionario_id = $funcionario_id;
    }

    /**
     * @param mixed $fornecedor_id
     */
    public function setFornecedor_id($fornecedor_id)
    {
        $this->fornecedor_id = $fornecedor_id;
    }

    /**
     * @param mixed $valorTotal
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    /**
     * @param mixed $parcelas
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
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
        $this->db->query('SELECT * FROM compra');
        return $this->db->resultados();
    }

    public function insert($dados)
    {
        $parcelas_int = (int) $dados['parcelas'];

        $this->setFornecedor_id(1);
        $this->setFuncionario_id(1);
        $this->setParcelas($parcelas_int);

        $this->db->query("INSERT INTO compra(id_funcionario, id_fornecedor, parcelas) VALUES (:id_funcionario, :id_fornecedor, :parcelas) RETURNING id_compra");

        $this->db->bind(':id_funcionario', $this->getFornecedor_id());
        $this->db->bind(':id_fornecedor', $this->getFuncionario_id());
        $this->db->bind(':parcelas', $this->getParcelas());

        if ($this->db->executa()) :
            // print_r($this->db->ultimoId());
            $this->setUltimoId($this->db->ultimoId()['id_compra']);
            // print_r($this->getUltimoId());
            return true;
        else :
            return false;
        endif;
    }
}
