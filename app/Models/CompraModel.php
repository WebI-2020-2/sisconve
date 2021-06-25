<?php

class CompraModel
{
    private $Id;
    private $funcionario_id;
    private $fornecedor_id;
    private $valorTotal;
    private $parcelas;

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
    public function selectAll()
    {
        $this->db->query('SELECT * FROM compra');
        return $this->db->resultados();
    }

    public function insert($dados)
    {
        $funcionario_id_int = (int) $dados['funcionario_id'];
        $fornecedor_id_int = (int) $dados['fornecedor_id'];
        $parcelas_int = (int) $dados['parcelas'];

        $this->setFornecedor_id($fornecedor_id_int);
        $this->setFuncionario_id($funcionario_id_int);
        $this->setParcelas($parcelas_int);

        $this->db->query("INSERT INTO compra(id_funcionario, id_fornecedor, parcelas) VALUES (:id_funcionario, :id_fornecedor, :parcelas)");

        $this->db->bind(':id_funcionario', $this->getFornecedor_id());
        $this->db->bind(':id_fornecedor', $this->getFuncionario_id());
        $this->db->bind(':parcelas', $this->getParcelas());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
