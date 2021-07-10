<?php

class ClienteModel
{
    private $Id;
    private $nomeCliente;
    private $cpf;
    private $credito;
    private $debito;
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
    public function getNomeCliente()
    {
        return $this->nomeCliente;
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
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * @return mixed
     */
    public function getDebito()
    {
        return $this->debito;
    }

    /**
     * @param mixed $nomeCliente
     */
    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $credito
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;
    }

    /**
     * @param mixed $debito
     */
    public function setDebito($debito)
    {
        $this->debito = $debito;
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
        $this->setNomeCliente($dados['nome']);
        $this->setCpf($dados['cpf']);

        $this->db->query("INSERT INTO cliente(nome_cliente, cpf) VALUES (:nome_cliente, :cpf) RETURNING id_cliente");

        $this->db->bind(":nome_cliente", $this->getNomeCliente());
        $this->db->bind(":cpf", $this->getCpf());

        if ($this->db->executa()) :
            $this->setUltimoId($this->db->ultimoId()['id_cliente']);
            return true;
        else :
            return false;
        endif;
    }

    public function VerificarCpf($cpf)
    {
        $this->setCpf($cpf);

        $this->db->query("SELECT cpf from cliente WHERE cpf = :cpf");
        $this->db->bind(":cpf", $this->getcpf());

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function selectAll()
    {
        $this->db->query("SELECT
	cliente.id_cliente,
	cliente.nome_cliente,
	cliente.cpf,
	cliente.credito,
	cliente.debito,
	telefone.num_telefone,
	telefone.ddd,
	telefone.whatsapp,
	endereco.rua,
	endereco.bairro,
	endereco.cidade,
	endereco.estado,
	endereco.numero,
    cliente.criado_em
FROM
	cliente,
	telefone,
	endereco 
WHERE
	telefone.id_cliente = cliente.id_cliente 
	AND endereco.id_cliente = cliente.id_cliente
    AND cliente.ativo <> false");
        return $this->db->resultados();
    }

    public function selectById($id)
    {
        $this->setId($id);
        $this->db->query("SELECT
	cliente.id_cliente,
	cliente.nome_cliente,
	cliente.cpf,
	cliente.credito,
	cliente.debito,
	telefone.num_telefone,
	telefone.ddd,
	telefone.whatsapp,
	endereco.rua,
	endereco.bairro,
	endereco.cidade,
	endereco.estado,
	endereco.numero,
    cliente.criado_em
FROM
	cliente,
	telefone,
	endereco 
WHERE
	telefone.id_cliente = cliente.id_cliente 
	AND endereco.id_cliente = cliente.id_cliente
    AND cliente.ativo <> false
    AND cliente.id_cliente = :id_cliente");
        $this->db->bind(":id_cliente", $this->getId());
        return $this->db->resultados();
    }

    public function deletar($id)
    {
        $this->setId($id);
        $this->db->query("UPDATE cliente SET ativo = false WHERE id_cliente = :id_cliente");
        $this->db->bind(":id_cliente", $this->getId());
        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
