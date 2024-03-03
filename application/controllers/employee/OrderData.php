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

        $this->db->select('tb_order.*, tb_user.*');
        $this->db->from('tb_order');
        $this->db->join('tb_user', 'tb_user.userID = tb_order.userID');

        $query = $this->db->get();
        if ($query) {
            $data['orders'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->query("SHOW COLUMNS FROM tb_order WHERE Field = 'orderStatus'");
        $row = $query->row();
        $orderstatuses = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row->Type));
        // Pass enum values to view
        $data['orderstatuses'] = $orderstatuses;

        $query = $this->db->query("SHOW COLUMNS FROM tb_order WHERE Field = 'orderMethod'");
        $row = $query->row();
        $ordermethods = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row->Type));
        // Pass enum values to view
        $data['ordermethods'] = $ordermethods;

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

    public function update()
    {
        $id = $this->input->post('orderid');
        $table = 'tb_order';
        $data = array(
            'orderMethod' => $this->input->post('ordermethod'),
            'orderStatus' => $this->input->post('orderstatus')
        );
        $this->Data->updateData($table, 'orderID', $id, $data);
        if ($this) {
            redirect('employee/orderdata');
        } else {
            echo "Update failed.";
        }
    }

    public function delete()
    {
        $orderid = $this->input->post('orderID');
        $this->load->model('Order');
        $this->Order->deleteOrder('tb_order', $orderid);
        redirect('employee/orderData');
    }
}