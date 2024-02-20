<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_cart_items()
    {
        $userid = $this->session->userdata('userID'); // Assuming you're storing user information in session
        $this->db->select('*');
        $this->db->from('cart_items');
        $this->db->where('userID', $userid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function calculate_total_price()
    {
        $userid = $this->session->userdata('userID');
        $this->db->select('SUM(price * quantity) as total_price');
        $this->db->from('cart_items');
        $this->db->where('userID', $userid);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['total_price'];
    }

    public function add_to_cart($productid)
    {
        $userid = $this->session->userdata('userID');
        $data = array(
            'userID' => $userid,
            'productID' => $productid,
            'quantity' => 1, // Default quantity, you can modify this as needed
            // Other fields you may want to store, such as price, etc.
        );
        $this->db->insert('cart_items', $data);
    }

}
