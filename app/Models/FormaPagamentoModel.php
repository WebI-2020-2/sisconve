<?php


class FormaPagamentoModel
{
    private $tipo_pagamento;

    public function __construct() 
    {
        $this->db = new Database();
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

}