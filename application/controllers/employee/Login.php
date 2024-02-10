<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{

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
        $this->load->view('employee/templates/header', $data);
        $this->load->view('employee/pages/login');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $userpassword = $this->input->post('userpassword');
        if ($this->auth->login_user($username, $userpassword)) {
            redirect('employee/home');
        } else {
            $this->session->set_flashdata('error', 'Username & Password Invalid');
            redirect('employee/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('userpassword');
        $this->session->unset_userdata('is_login');
        redirect('employee/login');
    }

}