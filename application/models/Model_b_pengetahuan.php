<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_b_pengetahuan extends CI_Model
{
    var $table = 'b_pengetahuan';

    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('gejala', 'gejala.id_gejala = b_pengetahuan.id_gejala', 'left');
        $this->db->join('diagnosa', 'diagnosa.id_diagnosa = b_pengetahuan.id_diagnosa', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllWhere($id_diagnosa)
    {
        $this->db->where('id_diagnosa', $id_diagnosa);
        $q = $this->db->get($this->table);
        return $q->result();
    }

    public function getById($id)
    {
        $this->db->where('id_b_pengetahuan', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function tambah($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function edit($id, $data)
    {
        $this->db->where('id_b_pengetahuan', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_b_pengetahuan', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
