<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Register';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/register', $data);
        $this->load->view('user/templates/footer');
    }

    public function generateUniqueID()
    {
        $prefix = 'CUST';
        $timestamp = time();
        $random = mt_rand(1000, 9999);
        $userid = $prefix . $timestamp . $random;
        return $userid;
    }

    public function process()
    {
        $userid = $this->generateUniqueID();
        $data = array(
            'userID' => $userid,
            'userName' => $this->input->post('username'),
            'userPassword' => $this->input->post('userpassword'),
            'userEmail' => $this->input->post('useremail'),
            'userPhone' => $this->input->post('userphone'),
            'userStatus' => 'customer'
        );
        $this->db->insert('tb_user', $data);
        redirect('authentication');
    }
}