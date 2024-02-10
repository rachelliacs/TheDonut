<?php
class Profile extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profile';
        $this->load->view('user/templates/header', $data);
        $this->load->view('pages/profile/profile');
        $this->load->view('user/templates/footer');
    }
}