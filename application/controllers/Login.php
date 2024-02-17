<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/login', $data);
        $this->load->view('user/templates/footer');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $userpassword = $this->input->post('userpassword');
        if ($this->auth->login_user($username, $userpassword)) {
            redirect('user/home');
        } else {
            $this->session->set_flashdata('error', 'Username & Password Invalid');
            redirect('user/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('userpassword');
        $this->session->unset_userdata('is_login');
        redirect('login');
    }

}