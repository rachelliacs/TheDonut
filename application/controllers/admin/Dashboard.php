<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Dashboard extends CI_Controller
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

                $data['title'] = 'Dashboard';
                $table = 'tb_store';

                $this->load->database();

                $data['storedatas'] = $this->Data->getStoreData($table);
                $StoreName = '';
                if (!empty($data['storedatas'])) {
                        $StoreName = $data['storedatas'][0]['storeName'];
                }
                $data['StoreName'] = $StoreName;

                $data['total_products'] = $this->Data->getTotal('tb_product');
                $data['total_users'] = $this->Data->getTotal('tb_user');
                $data['total_stocks'] = $this->Data->getSum('tb_product', 'productStock');
                $data['total_incomes'] = $this->Data->getSum('tb_order', 'orderTotalPrice');

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/contentTop');
                $this->load->view('admin/pages/dashboard', $data);
                $this->load->view('admin/templates/contentBottom');
                $this->load->view('admin/templates/footer');
        }
}