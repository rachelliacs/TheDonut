<?php
class Checkout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
        $this->load->config('midtrans');
        $this->load->helper('url');
        require_once(APPPATH . 'libraries/Midtrans.php');
        require_once './Midtrans/Midtrans/Config.php';
        require_once './Midtrans/Midtrans/Snap.php';
        require_once './Midtrans/Midtrans/Sanitizer.php';
        require_once './Midtrans/Midtrans/ApiRequestor.php';

    }

    public function index()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-uXlK-JboSjnzbCyhfx5jGpg_';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 5000,
            )
        );

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer

        $data['title'] = 'Checkout';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/checkout', $data);
        $this->load->view('user/templates/footer');
    }
}