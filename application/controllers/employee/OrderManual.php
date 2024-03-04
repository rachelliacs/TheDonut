<?php
defined("BASEPATH") or exit("No direct script access allowed");

class OrderManual extends CI_Controller
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

        $data['title'] = 'Order Manual';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_order');
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

        $this->load->view('employee/templates/header', $data);
        $this->load->view('employee/templates/contentTop');
        $this->load->view('employee/pages/orderManual');
        $this->load->view('employee/templates/contentBottom');
        $this->load->view('employee/templates/footer');
    }

    public function add()
    {
        $userid = $this->input->post('userid');
        $orderStatus = 'done';
        $orderMethod = 'cash';
        $selectedProducts = $this->input->post('products'); // Array of selected product IDs
        $orderTotalItems = $this->input->post('orderTotalItem'); // Array of corresponding quantities

        // Insert order into the database
        $orderData = array(
            'userID' => $userid,
            'orderStatus' => $orderStatus,
            'orderMethod' => $orderMethod
        );
        $this->db->insert('tb_order', $orderData);

        $orderid = rand();
        $transaction_time = date('Y-m-d H:i:s');

        // Insert order items into the database
        if (!empty($selectedProducts)) {
            foreach ($selectedProducts as $index => $productid) {
                $quantity = $orderTotalItems[$index];
                $orderItemData = array(
                    'orderID' => $orderid,
                    'userID' => $userid,
                    'cartQuantity' => $quantity,
                    'orderDate' => $transaction_time
                );
                $this->db->insert('tb_order', $orderItemData);
            }
        }
        redirect('employee/orderManual');
    }

}