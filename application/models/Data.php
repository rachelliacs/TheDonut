<?php
class Data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getDataById($table, $id)
    {
        return $this->db->get_where($table, array($id => $id))->row();
    }

    public function updateData($table, $id, $data)
    {
        $this->db->where($id, $id);
        $this->db->update($table, $data);
    }

    public function getStoreData($table)
    {
        $this->load->database();
        $query = $this->db->get($table);
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}