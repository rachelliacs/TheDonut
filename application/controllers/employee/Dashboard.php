<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Dashboard extends CI_Controller
{
        function __construct()
        {
                parent::__construct();
                $this->load->model('Auth');
                $this->load->model('Data');
        }

        public function index()
        {
                $data['title'] = 'Dashboard';
                $table = 'tb_store';

                $this->load->database();

                $data['storedatas'] = $this->Data->getStoreData($table);
                $StoreName = '';
                if (!empty($data['storedatas'])) {
                        $StoreName = $data['storedatas'][0]['storeName'];
                }
                $data['StoreName'] = $StoreName;

                $this->load->view('employee/templates/header', $data);
                $this->load->view('employee/templates/contentTop');
                $this->load->view('admin/pages/dashboard');
                $this->load->view('employee/templates/contentBottom');
        }
}