<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductStock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Product Stock';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_product');
        if ($query) {
            $data['products'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/productStock', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }
}