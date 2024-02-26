<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductStock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
    }

    public function index()
    {
        $this->Auth->check_admin(); // Memeriksa apakah pengguna adalah admin

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

    public function update()
    {
        $id = $this->input->post('productid');
        $table = 'tb_product';
        $data = array(
            'productName' => $this->input->post('productname'),
            'productStock' => $this->input->post('productstock')
        );
        $this->Data->updateData($table, 'productID', $id, $data);
        if ($this) {
            redirect('admin/productStock');
        } else {
            echo "Update failed.";
        }
    }
}