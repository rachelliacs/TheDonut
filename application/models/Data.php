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
        return $this->db->get_where($table, array('storeID' => $id))->row();
    }

    public function updateData($id, $data)
    {
        $this->db->where('storeID', $id);
        $this->db->update('tb_store', $data);
    }

}