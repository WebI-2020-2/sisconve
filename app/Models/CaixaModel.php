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
        $funcionarioIdInt = (int) $dados['id_funcionario'];
        $this->setValorEmCaixa($valorEmCaixaFloat);
        $this->setFuncionarioId($funcionarioIdInt);
        
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

    public function caixaFuncionario() 
    {
        $this->setFuncionarioId($_SESSION["FUNCIONARIO_ID"]);
        $this->db->query("SELECT id_caixa FROM caixa WHERE id_funcionario = :id_funcionario");
        $this->db->bind(":id_funcionario", $this->getFuncionarioId());
        $caixa_f = $this->db->resultados();
        foreach ($caixa_f as $caixa_i):
            $caixa = $caixa_i->id_caixa;
        endforeach;
        return $caixa;

    }
}
