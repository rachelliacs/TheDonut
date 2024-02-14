<?php
defined("BASEPATH") or exit("No direct script access allowed");

class StoreData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Store';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/storeData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('storeid');
        $table = 'tb_store';
        $data = array(
            'storeName' => $this->input->post('storename'),
            'storeLogo' => $this->input->post('storelogo'),
            'storeDesc' => $this->input->post('storedesc'),
        );
        $this->Data->updateData($table, 'storeID', $id, $data);
        if ($this) {
            redirect('admin/storeData');
        } else {
            echo "Update failed.";
        }
    }
}