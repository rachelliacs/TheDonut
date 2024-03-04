<?php
class CheckoutConfirmation extends CI_Controller
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
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer

        $data['title'] = 'Checkout Confirmation';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $userid = $this->session->userdata('userID');
        // Get the count of items in the cart
        $cart_count = $this->Cart->countItems($userid); // This function should return the count of items

        // Pass the count to the header view
        $data['cart_count'] = $cart_count;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/checkoutConfirmation', $data);
        $this->load->view('user/templates/footer');
    }
}