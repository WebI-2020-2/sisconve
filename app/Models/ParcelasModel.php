<?php

class ParcelasModel
{
    private PagamentoVendaModel $pagamentoVenda;
    private $numeroDaParcela;
    private $valorParcela;
    private $dataVencimento;
    private $dataPagamento;
    private $status;


    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return mixed
     */
    public function getPagamentoVenda()
    {
        return $this->pagamentoVenda;
    }

    /**
     * @return mixed
     */
    public function getNumeroDaParcela()
    {
        return $this->numeroDaParcela;
    }

    /**
     * @return mixed
     */
    public function getValorParcela()
    {
        return $this->valorParcela;
    }

    /**
     * @return mixed
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @return mixed
     */
    public function getDataPagamento()
    {
        return $this->dataPagamento;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $pagamentoVenda
     */
    public function setPagamentoVenda($pagamentoVenda)
    {
        $this->pagamentoVenda = $pagamentoVenda;
    }

    /**
     * @param mixed $numeroDaParcela
     */
    public function setNumeroDaParcela($numeroDaParcela)
    {
        $this->numeroDaParcela = $numeroDaParcela;
    }

    /**
     * @param mixed $valorParcela
     */
    public function setValorParcela($valorParcela)
    {
        $this->valorParcela = $valorParcela;
    }

    /**
     * @param mixed $dataVencimento
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * @param mixed $dataPagamento
     */
    public function setDataPagamento($dataPagamento)
    {
        $this->dataPagamento = $dataPagamento;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
