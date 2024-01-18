<?php
class Register extends CI_Controller {

    public function index()
    {
        $data ['title'] = 'Register';
        $this->load->view('templates/header', $data);
		$this->load->view($page = 'pages/user/register');
        $this->load->view('templates/footer');
    }

}