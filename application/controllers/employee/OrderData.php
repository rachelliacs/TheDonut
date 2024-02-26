<?php
defined("BASEPATH") or exit("No direct script access allowed");

class OrderData extends CI_Controller
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
        $this->Auth->check_employee(); // Memeriksa apakah pengguna adalah employee

        $data['title'] = 'Order';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

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

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('employee/templates/header', $data);
        $this->load->view('employee/templates/contentTop');
        $this->load->view('employee/pages/orderData', $data);
        $this->load->view('employee/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function delete()
    {
        $productid = $this->input->post('orderID');
        $this->load->model('Order');
        $this->Order->deleteOrder('tb_order', $orderid);
        redirect('employee/orderData');
    }
}