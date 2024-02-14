<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductCategory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Product Category';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/productCategory', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function add()
    {
        $data = array(
            'productCategoryName' => $this->input->post('productcategoryname')
        );
        $this->db->insert('tb_productCategory', $data);
        redirect('admin/productCategory');
    }

    public function edit($productid)
    {
        $data['productcategory'] = $this->Data->getData($productid);
        $this->load->view('admin/productCategory', $data);
    }

    public function update($productid)
    {
        $productname = $this->input->post('productname');
        $this->Data->updateData('tb_product', $productid, $productname);
        redirect('admin/productCategory');
    }

    public function delete()
    {
        $productcategoryid = $this->input->post('productCategoryID');
        $this->load->model('Product');
        $this->Product->deleteProductCategory('tb_productCategory', $productcategoryid);
        redirect('admin/productCategory');
    }

    public function records()
    {
        $this->load->model('Data');
        $table_name = 'tb_productCategory';
        $data['totalRecords'] = $this->Data->getTotalRecords($table_name);
        $this->load->view('admin/productCategory', $data);

    }
}