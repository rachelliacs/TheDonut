<?php
class SingleProduct extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Single Product';
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

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // User is not logged in, redirect to login page
            redirect('login');
        } else {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/pages/singleProduct', $data);
            $this->load->view('user/templates/footer');
        }
    }

    public function viewProduct($productid)
    {
        $data['title'] = 'Single Product';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        // Get the product by its ID
        $product = $this->Data->getProductById($productid);
        if ($product) {
            $data['product'] = $product;
        } else {
            // Product not found, handle the error (e.g., show a 404 page)
            show_404();
        }

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            // User is not logged in, redirect to login page
            redirect('login');
        } else {
            $this->load->view('user/templates/header', $data);
            $this->load->view('user/pages/singleProduct', $data);
            $this->load->view('user/templates/footer');
        }
    }
}