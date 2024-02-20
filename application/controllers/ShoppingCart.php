<?php
class ShoppingCart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->model('Cart');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Cart';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

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

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        // Fetch cart items from the database
        // $data['cart_items'] = $this->Cart->get_cart_items();
        // // Calculate total price
        // $data['total_price'] = $this->Cart->calculate_total_price();

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // User is not logged in, redirect to login page
            redirect('login');
        } else {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/pages/cart', $data);
            $this->load->view('user/templates/footer');
        }
    }

    public function add_to_cart($productid)
    {
        // Add product to cart
        $this->Cart->add_to_cart($productid);
        // Redirect to cart page
        redirect('cart');
    }

}