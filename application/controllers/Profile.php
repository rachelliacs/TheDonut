<?php
class Profile extends CI_Controller {

    public function index()
    {
        $data ['title'] = 'Profile';
        $this->load->view('templates/header', $data);
		$this->load->view($page = 'pages/profile/profile');
        $this->load->view('templates/footer');
	}
}