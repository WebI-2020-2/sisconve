<?php

class FuncionarioModel
{
    private $nomeFuncionario;
    private $telefone;
    private $cpf;
    private $endereço;
    private $cargo;
    private $salario;

    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * @return mixed
     */
    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getEndereço()
    {
        return $this->endereço;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param mixed $nomeFuncionario
     */
    public function setNomeFuncionario($nomeFuncionario)
    {
        $this->nomeFuncionario = $nomeFuncionario;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $endereço
     */
    public function setEndereço($endereço)
    {
        $this->endereço = $endereço;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @param mixed $salario
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }
}
