<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = 'Product';
        $this->load->database();

        $this->db->select('tb_product.*, tb_productCategory.productCategoryName');
        $this->db->from('tb_product');
        $this->db->join('tb_productCategory', 'tb_productCategory.productCategoryID = tb_product.productCategoryID');
        $query = $this->db->get();
        if ($query) {
            $data['products'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
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
        $this->load->view('admin/pages/productData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function add()
    {
        $data = array(
            'productName' => $this->input->post('productname'),
            'productCategoryID' => $this->input->post('productcategoryid'),
            'productImage' => 'thedonut-product(1).png',
            'productPrice' => $this->input->post('productprice'),
            'productSellingPrice' => $this->input->post('productsellingprice')
        );
        $this->db->insert('tb_product', $data);
        redirect('admin/productData');
    }

    public function delete()
    {
        $productid = $this->input->post('productID');
        $this->load->model('Product');
        $this->Product->deleteProduct('tb_product', $productid);
        redirect('admin/productData');
    }
}