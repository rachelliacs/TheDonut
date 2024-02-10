<?php
class SingleProduct extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Single Product';
        $this->load->view('user/templates/header', $data);
        $this->load->view('pages/product/singleProduct');
        $this->load->view('user/templates/footer');
    }
}