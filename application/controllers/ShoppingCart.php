<?php
class ShoppingCart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->model('Cart');
        $this->load->model('Product');
        $this->load->library('session');
        $this->load->config('midtrans');
        require_once(APPPATH . 'libraries/Midtrans.php');
    }

    public function index()
    {
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer

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

        $this->db->select('tb_cart.*, tb_product.*, tb_user.*');
        $this->db->from('tb_cart');
        $this->db->join('tb_product', 'tb_product.productID = tb_cart.productID');
        $this->db->join('tb_user', 'tb_user.userID = tb_cart.userID');

        $query = $this->db->get();
        if ($query) {
            $data['carts'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/shoppingcart', $data);
        $this->load->view('user/templates/footer');
    }

    public function delete()
    {
        $cartid = $this->input->post('cartID');
        $this->load->model('Product');
        $this->Product->deleteProductCart('tb_cart', $cartid);
        redirect('shoppingcart');
    }
}