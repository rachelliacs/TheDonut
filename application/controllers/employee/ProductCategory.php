<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductCategory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = 'Product Category';
        $this->load->database();

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }
        $this->load->database();

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('employee/templates/header', $data);
        $this->load->view('employee/templates/contentTop');
        $this->load->view('admin/pages/productCategory', $data);
        $this->load->view('employee/templates/contentBottom');
    }

    public function add()
    {
        $data = array(
            'productCategoryName' => $this->input->post('productcategoryname')
        );
        $this->db->insert('tb_productCategory', $data);
        redirect('employee/productCategory');
    }
}