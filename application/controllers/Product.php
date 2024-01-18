<?php
class Product extends CI_Controller {

    public function index()
    {
        $data ['title'] = 'Product';
        $this->load->view('templates/header', $data);
		$this->load->view($page = 'pages/product/product');
        $this->load->view('templates/footer');
	}
}