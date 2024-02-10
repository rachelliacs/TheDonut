<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/login');
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