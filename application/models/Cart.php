<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addToCart($data)
    {
        return $this->db->insert('tb_cart', $data);
    }

    public function getCartContents($userid)
    {
        return $this->db->get_where('tb_cart', array('userID' => $userid))->result_array();
    }

    public function countItems($userid)
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_cart');
        $this->db->where('userID', $userid);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['count'];
    }
}
