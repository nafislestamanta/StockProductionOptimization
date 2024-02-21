<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Recipe extends CI_Model
{
    public function getData()
    {
        $query = $this->db->query("SELECT *
        FROM resep a
        LEFT JOIN produk b ON b.id_produk = a.id_produk
        LEFT JOIN bahan c ON c.id_bahan = a.id_bahan
        ");

        return $query->result_array();
    }

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

    public function getDataByID($id_recipe)
    {
        $query = $this->db->query("SELECT * FROM resep WHERE id_resep = '$id_recipe'");

        return $query->row_array();
    }
    
    public function saveRecipe($product, $material, $limit_material, $id_recipe, $mode)
    {
        $this->db->set('id_produk', $product);
        $this->db->set('id_bahan', $material);
        $this->db->set('batas_jumlah_bahan', $limit_material);

        if ($mode == 'update') {
            $this->db->where('id_resep', $id_recipe);
            $result = $this->db->update('resep');
        } else {
            $result = $this->db->insert('resep');
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteData($id_recipe)
    {
        $this->db->where('id_resep', $id_recipe);
        $query = $this->db->delete('resep');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
