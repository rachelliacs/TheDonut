<?php
defined("BASEPATH") or exit("No direct script access allowed");

class SalesData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        // $this->auth->check_login();
    }

    public function index()
    {
        $data['title'] = 'Sales';
        $this->load->database();

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->db->select('tb_sales.*, tb_order.orderDate, tb_user.userName, tb_product.productName');
        $this->db->from('tb_sales');
        $this->db->join('tb_order', 'tb_order.orderID = tb_sales.orderID');
        $this->db->join('tb_user', 'tb_user.userID = tb_sales.userID');
        $this->db->join('tb_product', 'tb_product.productID = tb_sales.productID');

        $query = $this->db->get();
        if ($query) {
            $data['sales'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/salesData');
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }
}