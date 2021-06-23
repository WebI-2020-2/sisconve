<?php


class FormaPagamentoModel
{
    private $Id;
    private $tipo_pagamento;

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
    public function getTipo_pagamento()
    {
        return $this->tipo_pagamento;
    }

    /**
     * @param mixed $tipo_pagamento
     */
    public function setTipo_pagamento($tipo_pagamento)
    {
        $this->tipo_pagamento = $tipo_pagamento;
    }
    public function selectAll(){
        $this->db->query('SELECT * FROM forma_pagamento');
        return $this->db->resultados();
    }

}