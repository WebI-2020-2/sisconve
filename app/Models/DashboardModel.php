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
}
