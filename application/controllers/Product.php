<?php
class Product extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Product';
        $this->load->view('user/templates/header', $data);
        $this->load->view('pages/product/product');
        $this->load->view('user/templates/footer');
    }
}