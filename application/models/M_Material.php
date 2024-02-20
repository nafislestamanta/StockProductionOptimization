<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Material extends CI_Model
{
    public function getData()
    {
        $query = $this->db->query("SELECT * FROM bahan");

        return $query->result_array();
    }

    public function getDataByID($material_id)
    {
        $query = $this->db->query("SELECT * FROM bahan WHERE id_bahan = '$material_id'");

        return $query->row_array();
    }

    public function saveMaterial($material_name, $id_material, $mode)
    {
        $this->db->set('nama_bahan', $material_name);

        if ($mode == 'update') {
            $this->db->where('id_bahan', $id_material);
            $result = $this->db->update('bahan');
        } else {
            $result = $this->db->insert('bahan');
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteData($material_id)
    {
        $this->db->where('id_bahan', $material_id);
        $query = $this->db->delete('bahan');

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
