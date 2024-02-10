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
        $this->load->database();

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

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