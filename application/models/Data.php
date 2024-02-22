<?php
class Data extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($table, $condition)
    {
        return $this->db->get_where($table, $condition)->row_array();
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

    public function getProductById($productid)
    {
        $query = $this->db->get_where('tb_product', array('productID' => $productid));
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the first row as an associative array
        } else {
            return false; // Product not found
        }
    }
}