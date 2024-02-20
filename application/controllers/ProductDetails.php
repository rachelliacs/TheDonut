<?php
class ProductDetails extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Product Details';
        $this->load->view('user/templates/header', $data);
        $this->load->view('pages/productDetails');
        $this->load->view('user/templates/footer');
    }
}