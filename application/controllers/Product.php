<?php
class Product extends CI_Controller
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
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer
    }

    public function view($productid)
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

        $product = $this->Data->getProductById($productid);
        if ($product) {
            $data['product'] = $product;
        } else {
            show_404();
        }

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_product');
        if ($query) {
            $data['products'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_productImages');
        if ($query) {
            $data['smallImages'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/singleProduct', $data);
        $this->load->view('user/templates/footer');
    }

    public function addToCart($productid)
    {
        $this->Auth->check_customer();

        $userid = $this->session->userdata('userID');
        $product = $this->Data->getProductById($productid);
        $cartquantity = $this->input->post('cartquantity');

        if (!$product) {
            show_404();
        }

        $cart_data = array(
            'productid' => $productid,
            'cartquantity' => $cartquantity,
            'userid' => $userid
        );

        $this->Cart->addToCart($cart_data);

        redirect('shoppingcart');
    }

}