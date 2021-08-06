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
        $this->db->query("SELECT * FROM caixa WHERE id_caixa <> 1");
        return $this->db->resultados();
    }

    public function insert($dados)
    {
        $valorEmCaixaFloat = (float)$dados['valor_em_caixa'];
        $this->setValorEmCaixa($valorEmCaixaFloat);
        
        $this->db->query("INSERT INTO caixa(valor_em_caixa) VALUES (:valor_em_caixa)");
        $this->db->bind(":valor_em_caixa", $this->getValorEmCaixa());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
    public function update($dados)
    {
        $valorEmCaixaFloat = (float)$dados['valor_em_caixa'];
        $this->setValorEmCaixa($valorEmCaixaFloat);
        $this->setId($dados['caixa']);
        
        $this->db->query("UPDATE caixa SET valor_em_caixa = :valor_em_caixa WHERE id_caixa = :id_caixa");
        $this->db->bind(":valor_em_caixa", $this->getValorEmCaixa());
        $this->db->bind(":id_caixa", $this->getId());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function caixaFuncionario() 
    {
        $this->setFuncionarioId($_SESSION["FUNCIONARIO_ID"]);
        $this->db->query("SELECT id_caixa FROM funcionario WHERE id_funcionario = :id_funcionario");
        $this->db->bind(":id_funcionario", $this->getFuncionarioId());
        $caixa_f = $this->db->resultados();
        foreach ($caixa_f as $caixa_i):
            $caixa = $caixa_i->id_caixa;
        endforeach;
        return $caixa;
    }
}
