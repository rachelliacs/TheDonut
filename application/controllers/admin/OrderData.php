<?php
defined("BASEPATH") or exit("No direct script access allowed");

class OrderData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = 'Order';
        $this->load->database();

        $query = $this->db->get('tb_sales');
        if ($query) {
            $data['sales'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->db->select('tb_order.*, tb_user.userName, tb_product.productName');
        $this->db->from('tb_order');
        $this->db->join('tb_user', 'tb_user.userID = tb_order.userID');
        $this->db->join('tb_product', 'tb_product.productID = tb_order.productID');
        $query = $this->db->get();
        if ($query) {
            $data['orders'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_product');
        if ($query) {
            $data['products'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/orderData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function delete()
    {
        $orderid = $this->input->post('orderID');
        $this->load->model('Order');
        $this->Order->deleteOrder('tb_order', $orderid);
        redirect('admin/orderData');
    }
}