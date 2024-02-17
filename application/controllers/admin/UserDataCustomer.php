<?php
defined("BASEPATH") or exit("No direct script access allowed");

class UserDataCustomer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
    }

    public function index()
    {
        $data['title'] = 'Customer';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/userDataCustomer', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function generateUniqueID()
    {
        $prefix = 'CUST';
        $timestamp = time();
        $random = mt_rand(1000, 9999);
        $userid = $prefix . $timestamp . $random;
        return $userid;
    }

    public function add()
    {
        $userid = $this->generateUniqueID();
        $data = array(
            'userID' => $userid,
            'userName' => $this->input->post('username'),
            'userPassword' => $this->input->post('userpassword'),
            'userEmail' => $this->input->post('useremail'),
            'userPhone' => $this->input->post('userphone'),
            'userStatus' => 'customer'
        );
        $this->db->insert('tb_user', $data);
        redirect('admin/userDataCustomer');
    }

    public function update()
    {
        $id = $this->input->post('userid');
        $table = 'tb_user';
        $data = array(
            'userName' => $this->input->post('username'),
            'userEmail' => $this->input->post('useremail'),
            'userPhone' => $this->input->post('userphone'),
            'userPassword' => $this->input->post('userpassword'),
        );
        $this->Data->updateData($table, 'userID', $id, $data);
        if ($this) {
            redirect('admin/userDataCustomer');
        } else {
            echo "Update failed.";
        }
    }
}