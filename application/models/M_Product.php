<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{
    public function saveProduct($product_name, $production_limit, $work_deadline, $labor_limit, $product_profit, $id_product, $mode)
    {
        $this->db->set('nama_produk', $product_name);
        $this->db->set('batas_jumlah_produksi', $production_limit);
        $this->db->set('batas_waktu_pengerjaan', $work_deadline);
        $this->db->set('batas_tenaga_kerja', $labor_limit);
        $this->db->set('laba', $product_profit);

        if ($mode == 'update') {
                      $this->db->where('id_produk', $id_product);
            $result = $this->db->update('produk');
        } else {
            $result = $this->db->insert('produk');
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getData()
    {
        $query = $this->db->query("SELECT * FROM produk");

        return $query->result_array();
    }

    public function getDataByID($id_product)
    {
        $query = $this->db->query("SELECT * FROM produk WHERE id_produk = '$id_product'");

        return $query->row_array();
    }

    public function deleteData($id_product)
    {
        $this->db->where('id_produk', $id_product);
        $query = $this->db->delete('produk');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
