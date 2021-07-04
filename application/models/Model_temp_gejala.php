<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_temp_gejala extends CI_Model
{
    var $table = 'temp_gejala';

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

    public function getByIdKonsul($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('gejala', 'gejala.id_gejala = temp_gejala.id_gejala', 'left');
        $this->db->where('id_konsul', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id_konsul', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
