<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ProductData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Product';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

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

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/productData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function add()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB max size

        $this->upload->initialize($config);

        if ($this->upload->do_upload('productimage')) {
            $upload_data = $this->upload->data();
            $image_filename = $upload_data['file_name'];

            $data = array(
                'productName' => $this->input->post('productname'),
                'productCategoryID' => $this->input->post('productcategoryid'),
                'productImage' => $image_filename,
                'productPrice' => $this->input->post('productprice'),
                'productDesc' => $this->input->post('productdesc'),
                'productSellingPrice' => $this->input->post('productsellingprice'),
                'productStock' => $this->input->post('productstock'),
            );

            $this->db->insert('tb_product', $data);
            redirect('admin/productData');
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error); // Handle error appropriately
        }
    }

    public function update()
    {
        $id = $this->input->post('productid');
        $table = 'tb_product';

        // Retrieve existing product data
        $product = $this->Data->getAllData($table, array('productID' => $id));

        // Check if a new image is uploaded
        if (!empty($_FILES['productimage']['name'])) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB max size, adjust as needed

            $this->upload->initialize($config);

            if ($this->upload->do_upload('productimage')) {
                // Delete existing image file
                unlink('./assets/img/' . $product['productImage']);

                // Upload new image
                $upload_data = $this->upload->data();
                $image_filename = $upload_data['file_name'];

                // Update product data with new image filename
                $data = array(
                    'productImage' => $image_filename,
                    'productName' => $this->input->post('productname'),
                    'productCategoryID' => $this->input->post('productcategoryid'),
                    'productPrice' => $this->input->post('productprice'),
                    'productDesc' => $this->input->post('productdesc'),
                    'productSellingPrice' => $this->input->post('productsellingprice'),
                    'productStock' => $this->input->post('productstock'),
                );
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error); // Handle error appropriately
                return;
            }
        } else {
            // No new image uploaded, update other fields only
            $data = array(
                'productName' => $this->input->post('productname'),
                'productCategoryID' => $this->input->post('productcategoryid'),
                'productPrice' => $this->input->post('productprice'),
                'productDesc' => $this->input->post('productdesc'),
                'productSellingPrice' => $this->input->post('productsellingprice'),
                'productStock' => $this->input->post('productstock'),
            );
        }
        // Perform update operation
        $this->Data->updateData($table, 'productID', $id, $data);

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