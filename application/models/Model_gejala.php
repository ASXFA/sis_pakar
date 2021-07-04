<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_gejala extends CI_Model
{
    var $table = 'gejala';

    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->where('id_gejala', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }


    public function tambahGejala($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function editGejala($id, $data)
    {
        $this->db->where('id_gejala', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function deleteGejala($id)
    {
        $this->db->where('id_gejala', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
