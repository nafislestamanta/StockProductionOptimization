<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_StockOptimization extends CI_Model
{
    public function getDataProduct()
    {
        $query = $this->db->query("SELECT *
        FROM produk");

        return $query->result_array();
    }

    public function getDataMaterial()
    {
        $query = $this->db->query("SELECT *
        FROM bahan");

        return $query->result_array();
    }
}
