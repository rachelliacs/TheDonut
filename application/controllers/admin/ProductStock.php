<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductStock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        // $this->auth->check_login();
    }

    public function index()
    {
        $data['title'] = 'Product Stock';
        $this->load->database();

        $query = $this->db->get('tb_product');
        if ($query) {
            $data['products'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/productStock');
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }
}