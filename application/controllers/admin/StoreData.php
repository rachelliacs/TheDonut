<?php
defined("BASEPATH") or exit("No direct script access allowed");

class StoreData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = 'Store';
        $this->load->database();

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/storeData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }
}