<?php
defined("BASEPATH") or exit("No direct script access allowed");

class SalesData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
    }

    public function index()
    {
        $this->Auth->check_admin(); // Memeriksa apakah pengguna adalah admin

        $data['title'] = 'Sales';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
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