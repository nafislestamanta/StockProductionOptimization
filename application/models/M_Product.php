<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{
    public function saveProduct($product_name, $production_limit, $work_deadline, $labor_limit, $product_profit)
    {
        $this->db->set('nama_produk', $product_name);
        $this->db->set('batas_jumlah_produksi', $production_limit);
        $this->db->set('batas_waktu_pengerjaan', $work_deadline);
        $this->db->set('batas_tenaga_kerja', $labor_limit);
        $this->db->set('laba', $product_profit);

        $insert_result = $this->db->insert('produk');

        if ($insert_result) {
            return true;
        } else {
            return false;
        }
    }
}
