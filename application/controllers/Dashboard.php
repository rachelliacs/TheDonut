<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Dashboard extends CI_Controller
{
        function __construct()
        {
                parent::__construct();
                $this->load->model('Auth');
                $this->load->model('Data');
                $this->load->model('Cart');
                $this->load->library('session');
        }

        public function index()
        {
                $data['title'] = 'Home';
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

                $query = $this->db->get('tb_product');
                if ($query) {
                        $data['products'] = $query->result_array();
                } else {
                        echo "Error retrieving data from the database.";
                }

                $query = $this->db->get('tb_productCategory');
                if ($query) {
                        $data['productcategories'] = $query->result_array();
                } else {
                        echo "Error retrieving data from the database.";
                }

                $userid = $this->session->userdata('userID');
                // Get the count of items in the cart
                $cart_count = $this->Cart->countItems($userid); // This function should return the count of items

                // Pass the count to the header view
                $data['cart_count'] = $cart_count;

                $this->load->view('user/templates/header', $data);
                $this->load->view('user/pages/home', $data);
                $this->load->view('user/templates/footer');
        }
}