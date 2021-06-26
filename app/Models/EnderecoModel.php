<?php


class EnderecoModel
{
    private $Id;
    private $idCliente;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $numero;
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
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
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
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
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
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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



    public function selectAll()
    {
        $this->db->query('SELECT * FROM endereco');
        return $this->db->resultados();
    }

    public function insert($dados, $ultimoid)
    {
        $this->setRua($dados['rua']);
        $this->setBairro($dados['bairro']);
        $this->setCidade($dados['cidade']);
        $this->setEstado($dados['estado']);
        $this->setNumero($dados['numero']);

        // trasformando cliente_id em int
        // $cliente_id_int = (int)$dados['cliente_id_endereco'];
        $this->setIdCliente($ultimoid);
        // fim

        $this->db->query("INSERT INTO endereco(id_cliente, rua, bairro, cidade, estado, numero) VALUES (:id_cliente, :rua, :bairro, :cidade, :estado, :numero)");

        $this->db->bind(":id_cliente", $this->getIdCliente());
        $this->db->bind(":rua", $this->getRua());
        $this->db->bind(":bairro", $this->getBairro());
        $this->db->bind(":cidade", $this->getCidade());
        $this->db->bind(":estado", $this->getEstado());
        $this->db->bind(":numero", $this->getNumero());

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
