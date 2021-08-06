<?php

class CaixaModel
{
    private $Id;
    private $funcionarioId;
    private $valorEmCaixa;
    private $status;
    private $numeroCaixa;

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

    /**
     * Get the value of numeroCaixa
     */ 
    public function getNumeroCaixa()
    {
        return $this->numeroCaixa;
    }

    /**
     * Set the value of numeroCaixa
     *
     * @return  self
     */ 
    public function setNumeroCaixa($numeroCaixa)
    {
        $this->numeroCaixa = $numeroCaixa;

        return $this;
    }


    public function selectAll()
    {
        $this->db->query("SELECT * FROM caixa WHERE id_caixa <> 1");
        return $this->db->resultados();
    }

    public function insert($dados)
    {

        $this->setNumeroCaixa($dados['num-caixa']);
        
        $this->db->query("INSERT INTO caixa(numero_caixa) VALUES (:numero_caixa)");
        $this->db->bind(":numero_caixa", $this->getNumeroCaixa());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
    public function update($dados)
    {
        $this->setNumeroCaixa($dados['num-caixa']);
        $this->setId($dados['id_caixa']);
        
        $this->db->query("UPDATE caixa SET numero_caixa = :numero_caixa WHERE id_caixa = :id_caixa");
        $this->db->bind(":numero_caixa", $this->getNumeroCaixa());
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
        $this->db->query("SELECT caixa.numero_caixa FROM funcionario, caixa WHERE caixa.id_caixa = funcionario.id_caixa
        AND id_funcionario = :id_funcionario");
        $this->db->bind(":id_funcionario", $this->getFuncionarioId());
        $caixa_f = $this->db->resultados();
        foreach ($caixa_f as $caixa_i):
            $caixa = $caixa_i->numero_caixa;
        endforeach;
        return $caixa;
    }

    public function validarCaixa($caixa) 
    {
        $this->setNumeroCaixa($caixa);
        $this->db->query("SELECT numero_caixa FROM caixa WHERE numero_caixa = :numero_caixa");
        $this->db->bind(":numero_caixa", $this->getNumeroCaixa());

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }
}
