<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    var $table = 'admin';

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

    public function getByUname($uname)
    {
        $this->db->where('username', $uname);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function getById($id)
    {
        $this->db->where('id_admin', $id);
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
        $this->db->where('id_admin', $id);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('id_admin', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}
