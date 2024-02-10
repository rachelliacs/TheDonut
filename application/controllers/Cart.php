<?php
class Cart extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Cart';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/cart');
        $this->load->view('user/templates/footer');
    }
}