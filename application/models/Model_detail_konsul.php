<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_detail_konsul extends CI_Model
{
    var $table = 'detail_konsul';

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
        $this->db->where('id_detail_konsul', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function getByIdKonsul($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('diagnosa', 'diagnosa.id_diagnosa = detail_konsul.id_diagnosa', 'left');
        $this->db->where('id_konsul', $id);
        $q = $this->db->get();
        return $q->result();
    }

    public function tambah($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_konsul', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
