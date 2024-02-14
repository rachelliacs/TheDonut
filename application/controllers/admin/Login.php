<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries and models
        $this->load->model('Auth');
        $this->load->library('session');
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

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pages/login');
        $this->load->view('admin/templates/footer');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $userpassword = $this->input->post('userpassword');
        if ($this->auth->login_user($username, $userpassword)) {
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('error', 'Username & Password Invalid');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}