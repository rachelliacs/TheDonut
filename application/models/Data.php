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

    public function getDataById($table, $idField, $idValue)
    {
        return $this->db->get_where($table, array($idField => $idValue))->row();
    }

    public function updateData($table, $idField, $idValue, $data)
    {
        $this->db->where($idField, $idValue);
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