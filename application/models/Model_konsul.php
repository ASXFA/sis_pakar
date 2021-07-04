<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_konsul extends CI_Model
{
    var $table = 'konsul';

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
        $this->db->where('id_konsul', $id);
        $query = $this->db->get($this->table);
        return $query->row();
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
