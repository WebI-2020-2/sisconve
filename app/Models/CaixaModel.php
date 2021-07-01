<?php

class CaixaModel
{
    private $Id;
    private $funcionarioId;
    private $valorEmCaixa;
    private $status;

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
    public function getFuncionarioId()
    {
        return $this->funcionarioId;
    }

    /**
     * @return mixed
     */
    public function getValorEmCaixa()
    {
        return $this->valorEmCaixa;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $funcionarioId
     */
    public function setFuncionarioId($funcionarioId)
    {
        $this->funcionarioId = $funcionarioId;
    }

    /**
     * @param mixed $valorEmCaixa
     */
    public function setValorEmCaixa($valorEmCaixa)
    {
        $this->valorEmCaixa = $valorEmCaixa;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function selectAll()
    {
        $this->db->query("SELECT
		caixa.id_caixa,
        funcionario.id_funcionario,
        caixa.valor_em_caixa,
        caixa.status,
        caixa.criado_em
        FROM
        caixa,
        funcionario
        WHERE
        caixa.id_funcionario = funcionario.id_funcionario");
        return $this->db->resultados();
    }

    public function insert($dados)
    {
        $valorEmCaixaFloat = (float)$dados['valor_em_caixa'];
        $this->setValorEmCaixa($valorEmCaixaFloat);
        $this->setFuncionarioId(1);
        $this->setStatus(true);
        $this->db->query("INSERT INTO caixa(id_funcionario, valor_em_caixa, status) VALUES (:id_funcionario, :valor_em_caixa, :status)");
        $this->db->bind(":id_funcionario", $this->getFuncionarioId());
        $this->db->bind(":valor_em_caixa", $this->getValorEmCaixa());
        $this->db->bind(":status", $this->getStatus());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
