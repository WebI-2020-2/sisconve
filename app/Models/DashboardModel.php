<?php

class DashboardModel
{
    public function __construct()
    {
        $this->db = new Database();
    }


    public function produtoAbaixoEstoque()
    {
        $this->db->query("SELECT * FROM produtoAbaixoEstoque(:quantidade)");
        $this->db->bind(":quantidade", 10);
        return $this->db->resultados();
    }

    public function clienteParcelaVencendo($dataHoje)
    {
        $this->db->query("SELECT * FROM clienteParcelaVencendo(:dataHoje);");
        $this->db->bind(":dataHoje", $dataHoje);
        return $this->db->resultados();
    }

    public function totaldeClientes()
    {
        $this->db->query("SELECT count(*) AS totalcliente FROM cliente");
        return $this->db->resultado();
    }

    public function mediadeLucroDia($dia)
    {
        $this->db->query("SELECT AVG(produto.lucro) AS mediadeLucroDia FROM produto WHERE to_char(produto.criado_em, 'DD') = :dia;");
        $this->db->bind(":dia", $dia);
        return $this->db->resultado();
    }

    public function totalVendaDia($dia)
    {
        $this->db->query("SELECT count(id_venda) as totalVendaDia from venda WHERE to_char(venda.data_venda, 'DD') = :dia");
        $this->db->bind(":dia", $dia);
        return $this->db->resultado();
    }
}
