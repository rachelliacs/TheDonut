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
        $this->Auth->check_admin(); // Memeriksa apakah pengguna adalah admin

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

        $this->db->select('tb_order.*, tb_user.userName, tb_cart.*');
        $this->db->from('tb_order');
        $this->db->join('tb_user', 'tb_user.userID = tb_order.userID');
        $this->db->join('tb_cart', 'tb_cart.cartID = tb_order.cartID');
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